<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\EventInterface;

/**
 *
 */
class AdminController extends AppController
{
    /**
     * @var array
     */
    protected array $userSession;

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        $this->loadComponent('Authentication.Authentication');
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

    }

    /**
     * @param EventInterface $event
     * @return string
     */
    public function beforeFilter(EventInterface $event)
    {
        $result = $this->Authentication->getResult();
        if (strtolower($this->request->getParam('prefix')) == 'admin' && $result->isValid()) {
            $this->viewBuilder()->setLayout('admin');
            $this->userSession = $result->getData()->toArray();
            Configure::write('SessionUser', $this->userSession);
            $this->set([
                'userSession' => $this->userSession
            ]);

            if (!empty($userSession) && !$this->hasPermission($userSession)) {
                $this->Flash->error(__('Você não tem permissão para acessar essa URL "' . $this->request->here . '"'));
                return $this->redirect(['controller' => 'Home', 'action' => 'index']);
            }
        }
    }

    /**
     * @return string[]
     */
    protected static function ignoreControllerList() :array
    {
        return [
            '.',
            '..',
            'Component',
            'AppController.php',
            'AdminController.php',
            //não terá cadastro no sistema
//            'CidadesController.php',
//            'EstadosController.php',
//            'StatusController.php',
        ];
    }

    /**
     * @param array|null $usuario
     * @return bool
     */
    private function hasPermission(array $usuario = null) :bool
    {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        //Se tiver prefixo preenche, se não deixa null
        $prefix = $this->request->getParam('prefix');

        //Verifica se o controller atual existe na lista de ignorado
        if (in_array("{$controller}.Controller.php", self::ignoreControllerList())) {
            return true;
        }

        //Busca a lista de actions ignoradas por controller
        $ignoreListActions = $this->getActionsIgnoreController($controller, $prefix);
        if (in_array($action, $ignoreListActions)) {
            return true;
        }

        if (!empty($usuario)) {
            foreach ($usuario['niveis']['niveisPermissoes'] AS $permissoes) {
                if (
                    (strtolower($permissoes['action']) === strtolower($action))
                    && (strtolower($permissoes['controller']) === strtolower($controller))
                    && (strtolower($permissoes['prefix']) === strtolower($prefix))
                ) {
                    return true;
                }
            }
        } else {
            $this->Auth->config('authError', false);
        }

        return false;
    }

    public function getControllers($prefix = null) {
        $prefixo = !empty($prefix) ? $prefix . DS : '';

        $files = scandir('../src/Controller/' . $prefixo);
        $results = [];
        $ignoreList = self::ignoreControllerList();

        foreach ($files as $file) {
            if (!in_array($file, $ignoreList)) {
                $controller = explode('.', $file)[0];
                array_push($results, str_replace('Controller', '', $controller));
            }
        }
        return $results;
    }

    protected static function ignoreListActions()
    {
        return [
            'beforeFilter',
            'afterFilter',
            'initialize',
            'ignoreListActions',
            'autocomplete',
            'cropImageAjax',
            'download',
        ];
    }

    private function getActionsIgnoreController($controllerName, $prefix = null): array
    {
        //Concat prefix
        $prefix = !empty($prefix) ? ucfirst($prefix) . '\\' : '';

        //Monta o nome da class
        $className = 'App\\Controller\\' . $prefix . $controllerName . 'Controller';

        $ignoreListActions = [];
        if (method_exists($className, 'ignoreListActions')) {
            $ignoreListActions = $className::ignoreListActions();
        }
        return array_merge($this->ignoreListActions, $ignoreListActions);
    }

    /**
     * @param string $controllerName
     * @param string|null $prefix
     * @return array[]
     */
    public function getActionsList(string $controllerName, string $prefix = null) :array
    {
        //If exist prefix, is concat
        $prefix = !empty($prefix) ? $prefix . '\\' : '';

        //Build class name
        $className = "App\\Controller\\" . $prefix . $controllerName . 'Controller';

        //Reflection this class
        $class = new ReflectionClass($className);

        //List all public actions
        $actions = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        //Get list ignore actions
        $ignoreList = $this->getActionsIgnoreController($controllerName, str_replace('\\', '', $prefix));

        $results = [$controllerName => []];

        foreach ($actions as $action) {
            if (substr($action->name, -4) === 'Ajax') {
                $ignoreList[] = $action->name;
            }
            if ($action->class == $className && !in_array($action->name, $ignoreList)) {
                array_push($results[$controllerName], $action->name);
            }
        }
        return $results;
    }

    /**
     * @param string|null $prefix
     * @return array
     */
    public function getPermissionsList(string$prefix = null) :array
    {
        $resources = [];
        foreach ($this->getControllers($prefix) as $controller) {
            $actions = $this->getActionsList($controller, $prefix);
            array_push($resources, $actions);
        }
        return $resources;
    }
}

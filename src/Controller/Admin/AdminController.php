<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Services\Form\HomeFormService;
use App\Utils\TranslateControllerActions;
use Authentication\Authenticator\UnauthenticatedException;
use Cake\Core\Configure;
use Cake\Event\EventInterface;

/**
 *
 */
class AdminController extends AppController
{
    /**
     * @var HomeFormService $_formService
     */
    private HomeFormService $_formService;

    /**
     * @var array
     */
    protected array $userSession;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Security');
        $this->loadComponent('RequestHandler');
        $this->_formService = new HomeFormService($this);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $counts = $this->_formService->getCounts();
        $latestBlogs = $this->_formService->getLatestBlogs();

        $this->set(compact('counts', 'latestBlogs'));
    }

    /**
     * @param EventInterface $event
     * @return string
     */
    public function beforeFilter(EventInterface $event)
    {
        $result = $this->Authentication->getResult();
        if (strtolower($this->request->getParam('prefix')) == 'admin' && $result->isValid()) {
            $this->configurePrefixAdmin($result);
        }
    }

    /**
     * @param $result
     * @return \Cake\Http\Response|void|null
     */
    private function configurePrefixAdmin($result)
    {
        $this->viewBuilder()->setLayout('admin');
        $this->set([
            '_csrfToken' => $this->request->getCookie('csrfToken')
        ]);
        if (in_array($this->getRequest()->getParam('action'), self::ignoreValidatePost())) {
            $this->Security->setConfig('validatePost', false);
        }
        $this->userSession = $result->getData()->toArray();
        Configure::write('SessionUser', $this->userSession);
        $this->set([
            'userSession' => $this->userSession
        ]);
        try {
            $this->hasPermission();
        } catch (UnauthenticatedException $ex) {
            $this->Flash->error(__($ex->getMessage()));
            return $this->redirect(['controller' => 'Admin', 'action' => 'index']);
        }
    }

    /**
     * @return string[]
     */
    protected static function ignoreValidatePost() :array
    {
        return [
            'delete',
            'multipleFileUploads',
            'multipleFileUploadsDelete',
            'deleteYourContents',
        ];
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
            'CitiesController.php',
            'StatesController.php',
            'UtilsController.php',
        ];
    }

    /**
     * @return bool
     */
    private function hasPermission() :bool
    {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');

        //Se tiver prefixo preenche, se não deixa null
        $prefix = $this->request->getParam('prefix');

        if ($this->userSession['super']) {
            return true;
        }
        // verify if controller exist in ignore list
        if (in_array("{$controller}Controller.php", self::ignoreControllerList())) {
            return true;
        }
        //get actions list ignored by controller
        $ignoreListActions = $this->getActionsIgnoreController($controller, $prefix);
        if (in_array($action, $ignoreListActions)) {
            return true;
        }
        if (!empty($this->userSession['level']['levels_permissions'])) {
            foreach ($this->userSession['level']['levels_permissions'] AS $permission) {
                if (
                    (strtolower($permission['action']) === strtolower($action))
                    && (strtolower($permission['controller']) === strtolower($controller))
                    && (strtolower($permission['prefix']) === strtolower($prefix))
                ) {
                    return true;
                }
            }
        }
        $controllerTranslate = TranslateControllerActions::translateController($controller);
        $actionTranslate = TranslateControllerActions::translateAction($action);
        throw new UnauthenticatedException("Você não tem permissão para executar a seguinte ação: {$prefix}/{$controllerTranslate}/{$actionTranslate}");
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
            'ignoreListActionsCustom',
            'autocomplete',
            'removeUploads',
            'searchAjax',
            'cropImageAjax',
            'download',
        ];
    }

    private function getActionsIgnoreController(string $controllerName, string $prefix = ''): array
    {
        //Concat prefix
        $prefix = !empty($prefix) ? ucfirst($prefix) . '\\' : '';

        //build the class name
        $className = 'App\\Controller\\' . $prefix . $controllerName . 'Controller';

        $ignoreListActions = [];
        if (method_exists($className, 'ignoreListActionsCustom')) {
            $ignoreListActions = $className::ignoreListActionsCustom();
        }
        return array_merge(self::ignoreListActions(), $ignoreListActions);
    }

    /**
     * @param string $controllerName
     * @param string|null $prefix
     * @return array[]
     * @throws \ReflectionException
     */
    public function getActionsList(string $controllerName, string $prefix = null) :array
    {
        //If exist prefix, is concat
        $prefix = !empty($prefix) ? $prefix . '\\' : '';

        //Build class name
        $className = "App\\Controller\\" . $prefix . $controllerName . 'Controller';

        //Reflection this class
        $class = new \ReflectionClass($className);

        //List all public actions
        $actions = $class->getMethods(\ReflectionMethod::IS_PUBLIC);

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
     * @throws \ReflectionException
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

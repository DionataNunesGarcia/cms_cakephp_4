<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Services\Datatables\UsersDatatablesService;
use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AdminController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public static function ignoreListActions() {
        return [
            'login',
            'logout',
            'perfil',
            'renovarSenha',
            'primeiroAcesso',
            'excluirImagemPerfil',
        ];
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
     * Index Ajax method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function searchAjax()
    {
        if ($this->request->is('ajax')) {
            $datatableService = new UsersDatatablesService($this);
            $response = $datatableService->getResults();
            $this->RequestHandler->renderAs($this, 'json');
            $this->set(compact('response'));
            $this->set('_serialize', 'response');
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Levels', 'LogsAccess', 'LogsChange', 'Uploads'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $levels = $this->Users->Levels->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'levels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $levels = $this->Users->Levels->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'levels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Profile method
     *
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function profile()
    {
        $user = $this->Users->get($this->userSession['id'], [
            'contain' => [
                'Levels'
            ],
        ]);
        $this->set(compact('user'));
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        if ($this->request->is('post')) {
            $result = $this->Authentication->getResult();
            // regardless of POST or GET, redirect if user is logged in
            if ($result->isValid()) {
                // redirect to /articles after login success
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Admin',
                    'action' => 'index',
                ]);
                return $this->redirect($redirect);
            }
            // display error if user submitted and authentication failed
            if (!$result->isValid()) {
                $this->Flash->error(__('Invalid username or password'));
            }
        }
        $this->viewBuilder()->setLayout('login');
    }

    public function logout() {
        $this->Flash->success(__('Você saiu do sistema.'));
        return $this->redirect($this->Auth->logout());
    }

}

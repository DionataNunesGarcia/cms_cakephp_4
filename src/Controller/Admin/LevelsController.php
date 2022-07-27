<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Error\Exception\ValidationErrorException;
use App\Services\Datatables\LevelsDatatablesService;
use App\Services\Datatables\UsersDatatablesService;
use App\Services\Form\LevelsFormService;
use App\Services\Manager\LevelsManagerService;

/**
 * Levels Controller
 *
 * @property \App\Model\Table\LevelsTable $Levels
 * @method \App\Model\Entity\Level[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LevelsController extends AdminController
{
    /**
     * @var LevelsFormService $_formService
     */
    private LevelsFormService $_formService;

    /**
     * @var LevelsManagerService $_managerService
     */
    private LevelsManagerService $_managerService;

    /**
     * @var LevelsDatatablesService
     */
    private LevelsDatatablesService $_datatableService;

    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new LevelsFormService($this);
        $this->_managerService = new LevelsManagerService($this);
        $this->_datatableService = new LevelsDatatablesService($this);
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
        $response = $this->_datatableService->getResults();
        $this->RequestHandler->renderAs($this, 'json');
        $this->set(compact('response'));
        $this->set('_serialize', 'response');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $entity = $this->_formService->getEntity();
        if ($this->getRequest()->is('post')) {
            try {
                $response = $this->_managerService->saveEntity();
                $this->Flash->success($response['message']);
                return $this->redirect(['action' => 'edit', $response['data']->id]);
            } catch (ValidationErrorException $ex) {
                $entity = $ex->getEntity();
                $this->Flash->error($ex->getMessage());
            }
        }
        $permissionsList = $this->getPermissionsList('Admin');
        $this->set(compact('entity', 'permissionsList'));
        $this->render('edit');
    }

    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(int $id = null)
    {
        $this->_formService->setId($id);
        $entity = $this->_formService->getEntity();
        if ($this->getRequest()->is(['patch', 'post', 'put'])) {
            try {
                $id = $id ?? intval($this->request->getData('id'));
                $this->_managerService->setId($id);
                $response = $this->_managerService->saveEntity();
                $this->Flash->success($response['message']);
                return $this->redirect(['action' => 'edit', $response['data']->id]);
            } catch (ValidationErrorException $ex) {
                $entity = $ex->getEntity();
                $this->Flash->error($ex->getMessage());
            }
        }
        $permissionsList = $this->getPermissionsList('Admin');
        $this->set(compact('entity', 'permissionsList'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($ids)
    {
        $this->request->allowMethod(['post', 'delete']);
        $this->RequestHandler->renderAs($this,'json');
        try {
            $response = $this->_managerService->deletedEntities($ids);
        } catch (\Exception $exc) {
            $code = $exc->getCode() != 0? $exc->getCode() : 403;
            $this->response = $this->response->withStatus($code);
            $response = [
                'message' => $exc->getMessage(),
            ];
        }
        $this->set(compact('response'));
        $this->set('_serialize', 'response');
    }

    /**
     * autocomplete method
     *
     * @return \Cake\Http\Response|void
     */
    public function autocomplete()
    {
        $response = $this->_formService
            ->getAutocomplete();

        $this->RequestHandler->renderAs($this, 'json');
        $this->set(compact('response'));
        $this->set('_serialize', 'response');
    }
}

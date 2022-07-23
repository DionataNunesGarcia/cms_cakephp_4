<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Model\Entity\LogsAcces;
use App\Services\Datatables\LogsAccessDatatablesService;
use App\Services\Form\LogsAccessFormService;

/**
 * LogsAccess Controller
 *
 * @property \App\Model\Table\LogsAccessTable $LogsAccess
 * @method \App\Model\Entity\LogsAcces[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogsAccessController extends AdminController
{
    /**
     * @var LogsAccessFormService $_formService
     */
    private LogsAccessFormService $_formService;

    /**
     * @var LogsAccessDatatablesService
     */
    private LogsAccessDatatablesService $_datatableService;

    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new LogsAccessFormService($this);
        $this->_datatableService = new LogsAccessDatatablesService($this);
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
     * View method
     *
     * @param string|null $id Logs Acces id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(int $id = null)
    {
        $this->_formService->setId($id);
        $entity = $this->_formService->getEntity();
        $this->set(compact('entity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logsAcces = $this->LogsAccess->newEmptyEntity();
        if ($this->request->is('post')) {
            $logsAcces = $this->LogsAccess->patchEntity($logsAcces, $this->request->getData());
            if ($this->LogsAccess->save($logsAcces)) {
                $this->Flash->success(__('The logs acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs acces could not be saved. Please, try again.'));
        }
        $users = $this->LogsAccess->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('logsAcces', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Logs Acces id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logsAcces = $this->LogsAccess->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logsAcces = $this->LogsAccess->patchEntity($logsAcces, $this->request->getData());
            if ($this->LogsAccess->save($logsAcces)) {
                $this->Flash->success(__('The logs acces has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs acces could not be saved. Please, try again.'));
        }
        $users = $this->LogsAccess->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('logsAcces', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Logs Acces id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logsAcces = $this->LogsAccess->get($id);
        if ($this->LogsAccess->delete($logsAcces)) {
            $this->Flash->success(__('The logs acces has been deleted.'));
        } else {
            $this->Flash->error(__('The logs acces could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

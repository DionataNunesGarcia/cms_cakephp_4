<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * LogsChange Controller
 *
 * @property \App\Model\Table\LogsChangeTable $LogsChange
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogsChangeController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Records'],
        ];
        $logsChange = $this->paginate($this->LogsChange);

        $this->set(compact('logsChange'));
    }

    /**
     * View method
     *
     * @param string|null $id Logs Change id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $logsChange = $this->LogsChange->get($id, [
            'contain' => ['Users', 'Records'],
        ]);

        $this->set(compact('logsChange'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $logsChange = $this->LogsChange->newEmptyEntity();
        if ($this->request->is('post')) {
            $logsChange = $this->LogsChange->patchEntity($logsChange, $this->request->getData());
            if ($this->LogsChange->save($logsChange)) {
                $this->Flash->success(__('The logs change has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs change could not be saved. Please, try again.'));
        }
        $users = $this->LogsChange->Users->find('list', ['limit' => 200])->all();
        $records = $this->LogsChange->Records->find('list', ['limit' => 200])->all();
        $this->set(compact('logsChange', 'users', 'records'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Logs Change id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $logsChange = $this->LogsChange->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $logsChange = $this->LogsChange->patchEntity($logsChange, $this->request->getData());
            if ($this->LogsChange->save($logsChange)) {
                $this->Flash->success(__('The logs change has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The logs change could not be saved. Please, try again.'));
        }
        $users = $this->LogsChange->Users->find('list', ['limit' => 200])->all();
        $records = $this->LogsChange->Records->find('list', ['limit' => 200])->all();
        $this->set(compact('logsChange', 'users', 'records'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Logs Change id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $logsChange = $this->LogsChange->get($id);
        if ($this->LogsChange->delete($logsChange)) {
            $this->Flash->success(__('The logs change has been deleted.'));
        } else {
            $this->Flash->error(__('The logs change could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

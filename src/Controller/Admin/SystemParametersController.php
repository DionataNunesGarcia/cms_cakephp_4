<?php
declare(strict_types=1);

namespace App\Controller\Admin;

/**
 * SystemParameters Controller
 *
 * @property \App\Model\Table\SystemParametersTable $SystemParameters
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemParametersController extends AdminController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $systemParameters = $this->paginate($this->SystemParameters);

        $this->set(compact('systemParameters'));
    }

    /**
     * View method
     *
     * @param string|null $id System Parameter id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $systemParameter = $this->SystemParameters->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('systemParameter'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $systemParameter = $this->SystemParameters->newEmptyEntity();
        if ($this->request->is('post')) {
            $systemParameter = $this->SystemParameters->patchEntity($systemParameter, $this->request->getData());
            if ($this->SystemParameters->save($systemParameter)) {
                $this->Flash->success(__('The system parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The system parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('systemParameter'));
    }

    /**
     * Edit method
     *
     * @param string|null $id System Parameter id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $systemParameter = $this->SystemParameters->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $systemParameter = $this->SystemParameters->patchEntity($systemParameter, $this->request->getData());
            if ($this->SystemParameters->save($systemParameter)) {
                $this->Flash->success(__('The system parameter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The system parameter could not be saved. Please, try again.'));
        }
        $this->set(compact('systemParameter'));
    }

    /**
     * Delete method
     *
     * @param string|null $id System Parameter id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $systemParameter = $this->SystemParameters->get($id);
        if ($this->SystemParameters->delete($systemParameter)) {
            $this->Flash->success(__('The system parameter has been deleted.'));
        } else {
            $this->Flash->error(__('The system parameter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

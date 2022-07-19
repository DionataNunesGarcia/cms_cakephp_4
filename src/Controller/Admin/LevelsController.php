<?php
declare(strict_types=1);

namespace App\Controller\Admin;

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
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new LevelsFormService($this);
        $this->_managerService = new LevelsManagerService($this);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $levels = $this->paginate($this->Levels);

        $this->set(compact('levels'));
    }

    /**
     * View method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => ['LevelsPermissions', 'Users'],
        ]);

        $this->set(compact('level'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $level = $this->Levels->newEmptyEntity();
        if ($this->request->is('post')) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $this->set(compact('level'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $this->set(compact('level'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $level = $this->Levels->get($id);
        if ($this->Levels->delete($level)) {
            $this->Flash->success(__('The level has been deleted.'));
        } else {
            $this->Flash->error(__('The level could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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

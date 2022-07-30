<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Services\Form\AboutFormService;
use App\Services\Manager\AboutManagerService;

/**
 * About Controller
 *
 * @property \App\Model\Table\AboutTable $About
 * @method \App\Model\Entity\About[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutController extends AdminController
{
    /**
     * @var AboutFormService $_formService
     */
    private AboutFormService $_formService;

    /**
     * @var AboutManagerService $_managerService
     */
    private AboutManagerService $_managerService;

    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new AboutFormService($this);
        $this->_managerService = new AboutManagerService($this);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        $entity = $this->_formService->getEntity();
        if ($this->getRequest()->is(['patch', 'post', 'put'])) {
            try {
                $response = $this->_managerService->saveEntity();
                $this->Flash->success($response['message']);
                return $this->redirect(['action' => 'edit', $response['data']->id]);
            } catch (ValidationErrorException $ex) {
                $entity = $ex->getEntity();
                $this->Flash->error($ex->getMessage());
            }
        }
        $this->set(compact('entity'));
    }

    /**
     * @return void
     */
    public function banners()
    {
        $entity = $this->_formService->getEntity();
        if (empty($entity)) {
            $this->Flash->error(__('Precisa registrar um conteúdo Sobre para salvar os banners'));
            $this->redirect('edit');
        }
        $this->set(compact('entity'));
    }
}

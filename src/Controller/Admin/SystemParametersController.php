<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Error\Exception\ValidationErrorException;
use App\Services\Form\SystemParametersFormService;
use App\Services\Manager\SystemParametersManagerService;

/**
 * SystemParameters Controller
 *
 * @property \App\Model\Table\SystemParametersTable $SystemParameters
 * @method \App\Model\Entity\SystemParameter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemParametersController extends AdminController
{
    /**
     * @var SystemParametersFormService $_formService
     */
    private SystemParametersFormService $_formService;

    /**
     * @var SystemParametersManagerService $_managerService
     */
    private SystemParametersManagerService $_managerService;

    /**
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new SystemParametersFormService($this);
        $this->_managerService = new SystemParametersManagerService($this);
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
}

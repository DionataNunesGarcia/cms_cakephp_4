<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Error\Exception\ValidationErrorException;
use App\Services\Datatables\ContactsNewslettersDatatablesService;
use App\Services\Form\ContactsNewslettersFormService;
use App\Services\Manager\ContactsNewslettersManagerService;

/**
 * ContactsNewsletters Controller
 *
 * @property \App\Model\Table\ContactsNewslettersTable $ContactsNewsletters
 * @method \App\Model\Entity\ContactsNewsletter[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsNewslettersController extends AdminController
{
    /**
     * @var ContactsNewslettersFormService $_formService
     */
    private ContactsNewslettersFormService $_formService;

    /**
     * @var ContactsNewslettersDatatablesService
     */
    private ContactsNewslettersDatatablesService $_datatableService;

    /**
     * @var ContactsNewslettersManagerService
     */
    private ContactsNewslettersManagerService $_managerService;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new ContactsNewslettersFormService($this);
        $this->_datatableService = new ContactsNewslettersDatatablesService($this);
        $this->_managerService = new ContactsNewslettersManagerService($this);
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
     * @param int|null $id Logs Change id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(int $id = null)
    {
        $this->viewBuilder()->setLayout(null);
        $this->_formService->setId($id);
        $entity = $this->_formService->getEntity();
        $this->set(compact('entity'));
        $this->render('view');
    }

    /**
     * Delete method
     *
     * @param $ids
     * @return void
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
     * View method
     *
     * @param int|null $id Logs Change id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function enabledDisabled(int $id = null)
    {
        $this->viewBuilder()->setLayout(null);
        if ($this->getRequest()->is(['patch', 'post', 'put'])) {
            try {
                $this->_managerService->setId($id);
                $response = $this->_managerService->changeStatus();
                $this->Flash->success($response['message']);
                return $this->redirect(['action' => 'edit', $response['data']->id]);
            } catch (ValidationErrorException $ex) {
                $entity = $ex->getEntity();
                $this->Flash->error($ex->getMessage());
            }
        }
        $entity = $this->_formService->getEntity();
        $this->set(compact('entity'));
        $this->render('view');
    }
}

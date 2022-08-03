<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Services\Datatables\ContactsDatatablesService;
use App\Services\Form\ContactsFormService;
use App\Services\Manager\ContactsManagerService;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AdminController
{
    /**
     * @var ContactsFormService $_formService
     */
    private ContactsFormService $_formService;

    /**
     * @var ContactsDatatablesService
     */
    private ContactsDatatablesService $_datatableService;

    /**
     * @var ContactsManagerService
     */
    private ContactsManagerService $_managerService;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new ContactsFormService($this);
        $this->_datatableService = new ContactsDatatablesService($this);
        $this->_managerService = new ContactsManagerService($this);
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
}

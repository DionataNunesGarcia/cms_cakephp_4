<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Services\Datatables\LogsChangeDatatablesService;
use App\Services\Form\LogsChangeFormService;

/**
 * LogsChange Controller
 *
 * @property \App\Model\Table\LogsChangeTable $LogsChange
 * @method \App\Model\Entity\LogsChange[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogsChangeController extends AdminController
{
    /**
     * @var LogsChangeFormService $_formService
     */
    private LogsChangeFormService $_formService;

    /**
     * @var LogsChangeDatatablesService
     */
    private LogsChangeDatatablesService $_datatableService;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new LogsChangeFormService($this);
        $this->_datatableService = new LogsChangeDatatablesService($this);
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
}

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
}

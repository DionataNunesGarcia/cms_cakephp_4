<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Error\Exception\ValidationErrorException;
use App\Services\Form\EventsFormService;
use App\Services\Manager\EventsManagerService;
use App\Services\Manager\EventsTypesManagerService;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 * @method \App\Model\Entity\Event[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EventsController extends AdminController
{
    /**
     * @var EventsFormService $_formService
     */
    private EventsFormService $_formService;

    /**
     * @var EventsManagerService $_managerService
     */
    private EventsManagerService $_managerService;

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->_formService = new EventsFormService($this);
        $this->_managerService = new EventsManagerService($this);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $allowedAddEventType = $this->_formService->hasPermission('add', 'EventsTypes');
        $this->set(compact('allowedAddEventType'));
    }

    public function feed($id=null) {

        $this->request->allowMethod(['get']);
        $this->RequestHandler->renderAs($this,'json');
        try {
            $this->_formService->setId($id);
            $response = $this->_formService->getFeed();
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
     * @param int|null $id
     * @return void
     */
    public function updateEvent(int $id = null)
    {
        $this->request->allowMethod(['post', 'put', 'patch']);
        $this->RequestHandler->renderAs($this,'json');
        try {
            if ($id) {
                $this->_managerService->setId($id);
            }
            $response = $this->_managerService->saveEntity();
        } catch (\Exception $exc) {
            dd($exc);
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
     * Edit method
     *
     * @param int|null $id id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit(int $id = null)
    {
        $this->redirect(['action' => 'edit', $id]);
    }

    /**
     * Edit method
     *
     * @param string|null $id id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view(int $id = null)
    {
        $this->_formService->setId($id);
        $entity = $this->_formService->getEntity();
        if ($this->getRequest()->is(['patch', 'post', 'put'])) {
            try {
                $id = $id ?? intval($this->request->getData('id'));
                $this->_managerService->setId($id);
                $response = $this->_managerService->saveEntity();
                $this->Flash->success($response['message']);
                return $this->redirect(['action' => 'index']);
            } catch (ValidationErrorException $ex) {
                $entity = $ex->getEntity();
                $this->Flash->error($ex->getMessage());
            }
        }
        $this->set(compact('entity'));
        $this->render('edit');
    }

    /**
     * Delete method
     *
     * @param $ids
     * @return \Cake\Http\Response|void|null
     * @throws \Exception
     */
    public function delete($ids)
    {
        try {
            $response = $this->_managerService->deletedEntities($ids);
            $this->Flash->success($response['message']);
            return $this->redirect(['action' => 'index']);
        } catch (ValidationErrorException $ex) {
            $entity = $ex->getEntity();
            $this->Flash->error($ex->getMessage());
        }
        $this->set(compact('entity'));
        $this->render('edit');
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


    /**
     * Add method
     *
     * @return \Cake\Http\Response|void|null
     */
    public function addEventTypeCustom()
    {
        $this->request->allowMethod(['post', 'put']);
        $this->RequestHandler->renderAs($this,'json');
        try {
            $manager = new EventsTypesManagerService($this);
            $response = $manager->saveCustom();
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

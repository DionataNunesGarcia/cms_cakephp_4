<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Services\DefaultService;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;

class AboutManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('About');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function saveEntity()
    {
        $entity = $this->_controller
            ->{$this->getModel()}
            ->patchEntity($this->getEntity(), $this->_request->getData());
        try {
            if (!$this->_controller->{$this->getModel()}->save($entity)) {
                dd($entity);
                throw new ValidationErrorException($entity);
            }
        } catch (\PDOException $ex) {

            dd($ex);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }
}

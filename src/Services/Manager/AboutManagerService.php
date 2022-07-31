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
    public function saveEntity() :array
    {
        $entity = $this->__table
            ->patchEntity($this->getEntity(), $this->_request->getData());
        if (!$this->__table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }
}

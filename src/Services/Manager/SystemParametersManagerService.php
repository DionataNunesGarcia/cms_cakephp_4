<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Services\DefaultService;
use Cake\Controller\Controller;

class SystemParametersManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('SystemParameters');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function saveEntity()
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

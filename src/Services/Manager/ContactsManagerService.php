<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Model\Entity\ContactsNewsletter;
use App\Model\Table\LevelsPermissionsTable;
use App\Model\Table\LevelsTable;
use App\Services\DefaultService;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class ContactsManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Contacts');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function changeStatus() :array
    {
        /** @var ContactsNewsletter $entity */
        $entity = $this->getEntity();

        $entity->status = $this->_request->getData('status');
        $entity->modified = FrozenTime::now();

        if (!$this->__table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }
}

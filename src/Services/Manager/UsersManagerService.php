<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Model\Entity\User;
use App\Services\DefaultService;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class UsersManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Users');
        parent::__construct($controller);
    }

    public function saveEntity()
    {
        $entity = $this->_controller
            ->{$this->getModel()}
            ->patchEntity($this->getEntity(), $this->_request->getData());

        if (!$this->_controller->{$this->getModel()}->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }

    public function deletedEntities($ids)
    {
        $ids = explode(',', $ids);
        if (empty($ids)) {
            throw new \Exception("Nenhum registro foi selecionado", HttpStatusCodeEnum::BAD_REQUEST);
        }

        $entities = $this->_controller->{$this->getModel()}
            ->find()
            ->where([
                'id IN'  => $ids,
            ])
            ->toArray();

        foreach ($entities as $entity) {
            $entity->status = StatusEnum::EXCLUDED;
            $entity->user = "#del-{$entity->id}#{$entity->user}";
            $entity->modified = FrozenTime::now();
            if (!$this->_controller->{$this->getModel()}->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao deletar o Usuário {$entity->user}");
            }
        }
        $this->response['data'] = $entities;
        $this->response['status'] = HttpStatusCodeEnum::RESET_CONTENT;
        return $this->response;
    }

    /**
     * @param User $user
     * @return array
     */
    public function generateLog(User $user) :array
    {
        $tableParameters = TableRegistry::getTableLocator()->get("LogsAccess");
        $parameters = $tableParameters->getEntity();
        if (!$parameters->generate_access_logs) {
            return $this->response;
        }

        $table = TableRegistry::getTableLocator()->get("LogsAccess");
        $entity = $table->getEntity();

        $entity->user_id = $user->id;
        $entity->ip = $this->_request->clientIp();
        $entity->created = FrozenTime::now();

        if (!$table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        $this->response['data'] = $entity;
        return $this->response;
    }
}

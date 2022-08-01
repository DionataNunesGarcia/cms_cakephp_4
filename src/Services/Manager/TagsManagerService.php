<?php

namespace App\Services\Manager;

use App\Error\Exception\ValidationErrorException;
use App\Model\Table\LevelsPermissionsTable;
use App\Model\Table\LevelsTable;
use App\Services\DefaultService;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class TagsManagerService extends DefaultService
{
    /**
     * @var LevelsPermissionsTable
     */
    private $_levelsPermissionsTable;

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Tags');
        parent::__construct($controller);
    }

    public function saveEntity()
    {
        $entity = $this->__table
            ->patchEntity($this->getEntity(), $this->_request->getData());

        if (!$this->__table->save($entity)) {
            dd($entity);
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

        $entities = $this->__table
            ->find()
            ->where([
                'id IN'  => $ids,
            ])
            ->toArray();

        foreach ($entities as $entity) {
            $entity->status = StatusEnum::EXCLUDED;
            $entity->modified = FrozenTime::now();
            if (!$this->__table->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao deletar a Tag {$entity->name}");
            }
        }
        $this->response['data'] = $entities;
        $this->response['status'] = HttpStatusCodeEnum::RESET_CONTENT;
        return $this->response;
    }

    /**
     * @param Entity $level
     * @return void
     */
    private function saveLevelsPermissions(Entity $level) :void
    {
        $levelsPermissions = $this->_request->getData('levelsPermissions');
        $this->_levelsPermissionsTable
            ->deleteAll([
                'level_id' => $level->id
            ]);
        foreach ($levelsPermissions as $permission) {
            $entity = $this->_levelsPermissionsTable->newEntity([]);
            list($prefix, $controller, $action) = explode(':', $permission);

            $entity->level_id = $level->id;
            $entity->prefix = $prefix;
            $entity->controller = $controller;
            $entity->action = $action;

            if (!$this->_levelsPermissionsTable->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao salvar a permissão");
            }
        }
    }
}

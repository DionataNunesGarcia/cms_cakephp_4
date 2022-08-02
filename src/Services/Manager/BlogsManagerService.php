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

class BlogsManagerService extends DefaultService
{
    private TagsManagerService $tagsManagerService;

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Blogs');
        parent::__construct($controller);
        $this->tagsManagerService = new TagsManagerService($controller);
    }

    /**
     * @return array
     */
    public function saveEntity() :array
    {
        $entity = $this->__table
            ->patchEntity($this->getEntity(), $this->_request->getData());

        if ($entity->isNew()) {
            $entity->user_id = $this->_userSession['id'];
        }
        if (!$this->__table->save($entity)) {
            throw new ValidationErrorException($entity);
        }
        // save tags
        $this->tagsManagerService->saveTagsModels(
            $entity->id,
            $this->getModel(),
            $this->_request->getData('tags') ?? []
        );
        $this->response['data'] = $entity;
        return $this->response;
    }

    /**
     * @param string $ids
     * @param bool $onlyOwn
     * @return array
     * @throws \Exception
     */
    public function deletedEntities(string $ids, bool $onlyOwn = false) :array
    {
        $ids = explode(',', $ids);
        if (empty($ids)) {
            throw new \Exception("Nenhum registro foi selecionado", HttpStatusCodeEnum::BAD_REQUEST);
        }
        $conditions['id IN'] = $ids;
        if ($onlyOwn) {
            $conditions['user_id'] = $this->_userSession['id'];
        }
        $entities = $this->__table
            ->find()
            ->where($conditions)
            ->toArray();

        foreach ($entities as $entity) {
            $entity->status = StatusEnum::EXCLUDED;
            $entity->modified = FrozenTime::now();
            if (!$this->__table->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao deletar o blog {$entity->name}");
            }
        }
        $this->response['data'] = $entities;
        $this->response['status'] = HttpStatusCodeEnum::RESET_CONTENT;
        return $this->response;
    }
}

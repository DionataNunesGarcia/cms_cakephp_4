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

class ContactsNewslettersManagerService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('ContactsNewsletters');
        parent::__construct($controller);
    }

    /**
     * @param string $ids
     * @return array
     * @throws \Exception
     */
    public function deletedEntities(string $ids) :array
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
            $entity->email = "#del-{$entity->id}#{$entity->email}";
            $entity->modified = FrozenTime::now();
            if (!$this->__table->save($entity)) {
                throw new ValidationErrorException($entity, "Erro ao deletar o registro {$entity->name}");
            }
        }
        $this->response['data'] = $entities;
        $this->response['status'] = HttpStatusCodeEnum::RESET_CONTENT;
        return $this->response;
    }
}

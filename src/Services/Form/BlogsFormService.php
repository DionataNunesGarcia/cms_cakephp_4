<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class BlogsFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Blogs');
        parent::__construct($controller);
    }

    /**
     * @param bool $own
     * @return Entity
     * @throws \Exception
     */
    public function getEntity(bool $onlyOwn = false) :Entity
    {
        $id = $this->getId() ?? null;
        $entity = $this->__table
            ->getEntity($id);
        if ($onlyOwn && $entity->user_id != $this->_userSession['id']) {
            throw new \Exception('Esse conteúdo não pertence a você.', HttpStatusCodeEnum::NOT_ACCEPTABLE);
        }
        return $entity;
    }

    /**
     * @return array
     */
    public function getAutocomplete() :array
    {
        $conditions["{$this->getModel()}.status !="] = StatusEnum::EXCLUDED;
        if ($this->_request->getQuery('id')) {
            //if load the id, get then
            $conditions["{$this->getModel()}.id IN"] = explode(',',$this->_request->getQuery('id'));
        }
        if (!empty($this->_request->getQuery('term'))) {
            //se pesquisar, busca pelo termo
            $conditions["upper({$this->getModel()}.title) like"] = '%' . strtoupper($this->_request->getQuery('term')) . '%';
            $conditions["upper({$this->getModel()}.subtitle) like"] = '%' . strtoupper($this->_request->getQuery('term')) . '%';
        }
        return  $this->__table
            ->find('list', [
                'keyField' => function($q){},
                'valueField' => function($q){
                    return [
                        'id' => $q->id,
                        'value' => "{$q->title}"
                    ];
                },
            ])
            ->where($conditions)
            ->limit($this->autocompleteLimit)
            ->toArray();
    }
}

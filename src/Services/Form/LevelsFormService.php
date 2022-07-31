<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class LevelsFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Levels');
        parent::__construct($controller);
    }

    public function getAutocomplete() :array
    {
        $query = $this->__table
            ->find('list', [
                'keyField' => function($q){},
                'valueField' => function($q){
                    return [
                        'id' => $q->id,
                        'value' => "{$q->name}"
                    ];
                },
            ])
            ->where([
                "{$this->getModel()}.status !=" => StatusEnum::EXCLUDED
            ])
            ->limit($this->autocompleteLimit);

        if ($this->_request->getQuery('id')) {
            //if load the id, get then
            $query->where([
                "{$this->getModel()}.id in " => explode(',',$this->_request->getQuery('id'))
            ]);
        } else if (!empty($this->_request->getQuery('term'))) {
            //se pesquisar, busca pelo termo
            $query->where([
                "upper({$this->getModel()}.name) like" => '%' . strtoupper($this->_request->getQuery('term')) . '%',
            ]);
        }
        return $query->toArray();
    }
}

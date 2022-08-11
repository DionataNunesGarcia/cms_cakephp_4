<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class EventsTypesFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('EventsTypes');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function getList() :array
    {
        $listFixed = $this->getListFixed();
        $listUser = $this->getListUser();
        $this->response['data'] = array_merge($listFixed, $listUser);
        return $this->response;
    }

    /**
     * @return array
     */
    private function getListFixed() :array
    {
        return $this->__table
            ->find()
            ->where([
                'status !=' => StatusEnum::EXCLUDED,
                'deletable' => false,
                'user_id IS' => null
            ])
            ->toArray();
    }

    /**
     * @return array
     */
    private function getListUser() :array
    {
        return $this->__table
            ->find()
            ->where([
                'status !=' => StatusEnum::EXCLUDED,
                'user_id' => $this->_userSession['id']
            ])
            ->toArray();
    }
}

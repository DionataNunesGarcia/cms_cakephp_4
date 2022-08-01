<?php

namespace App\Services\Form;

use App\Model\Entity\User;
use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class HomeFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        parent::__construct($controller);
    }

    public function getCounts()
    {
        $users = TableRegistry::getTableLocator()->get("Users")
            ->find()
            ->where(['status !=' => StatusEnum::EXCLUDED])
            ->count();

        return [
            'users' => $users,
        ];
    }

}

<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;

class SystemParametersFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('SystemParameters');
        parent::__construct($controller);
    }

    public function buildUserLogged(int $userId)
    {
        return $this->_controller
            ->{$this->getModel()}
            ->find()
            ->where([
                "{$this->getModel()}.id" => $userId,
                "{$this->getModel()}.status" => StatusEnum::ACTIVE,
            ])
            ->contain([
                "Levels.LevelsPermissions",
                "Avatar"
            ])
            ->firstOrFail();
    }

}

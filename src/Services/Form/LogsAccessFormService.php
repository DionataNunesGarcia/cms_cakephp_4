<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

class LogsAccessFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('LogsAccess');
        parent::__construct($controller);
    }

}

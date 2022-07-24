<?php

namespace App\Services\Form;

use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;

class AboutFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('About');
        parent::__construct($controller);
    }
}

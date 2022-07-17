<?php

namespace App\Services;

use Cake\Controller\Controller;

class DefaultService
{
    protected Controller $_controller;
    protected $_request;
    protected int $id;

    public function __construct(Controller $controller)
    {
        $this->_controller = $controller;
        $this->_request = $this->_controller->getRequest();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function setId(int $id = null)
    {
        $this->id = $id;
    }
}

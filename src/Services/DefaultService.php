<?php

namespace App\Services;

use App\Utils\Enum\HttpStatusCodeEnum;
use Cake\Controller\Controller;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

class DefaultService
{
    /**
     * @var Controller $_controller
     */
    protected Controller $_controller;

    /**
     * @var \Cake\Http\ServerRequest
     */
    protected $_request;

    /**
     * @var ?int $id
     */
    protected ?int $id;

    /**
     * @var string
     */
    protected string $__model;

    /**
     * @var TableRegistry
     */
    protected $__table;

    /**
     * int $autocompleteLimit
     */
    protected int $autocompleteLimit = 20;

    protected array $response = [
        'status' => HttpStatusCodeEnum::OK,
        'message' => 'Ação efetuada com sucesso',
        'data' => null
    ];

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->__model;
    }

    /**
     * @param string $_model
     */
    public function setModel(string $_model)
    {
        $this->__model = $_model;
    }

    public function __construct(Controller $controller)
    {
        $this->_controller = $controller;
        $this->_request = $this->_controller->getRequest();
    }

    /**
     * @return ?int
     */
    public function getId() :?int
    {
        return $this->id ?? null;
    }

    /**
     * @param int|null $id
     * @return void
     */
    public function setId(int $id = null)
    {
        $this->id = $id;
    }

    /**
     * @return Entity
     */
    public function getEntity() :Entity
    {
        $id = $this->getId() ?? null;
        return $this->_controller
            ->{$this->getModel()}
            ->getEntity($id);
    }
}

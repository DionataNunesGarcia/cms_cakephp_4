<?php

namespace App\Services;

use App\Error\Exception\ValidationErrorException;
use App\Model\Entity\User;
use App\Utils\Enum\HttpStatusCodeEnum;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\Entity;
use Cake\ORM\Table;
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
     * @var User
     */
    protected $_userSession;

    /**
     * @var ?int $id
     */
    protected ?int $id;

    /**
     * @var string
     */
    protected string $__model;

    /**
     * @var Table
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
        $this->__table = TableRegistry::getTableLocator()->get($_model);
    }

    public function __construct(Controller $controller)
    {
        $this->_controller = $controller;
        $this->_request = $this->_controller->getRequest();

        if ($this->_request->getSession()->check('Auth')) {
            $this->_userSession = $this->_request
                ->getSession()
                ->read('Auth');
        }
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
        return $this->__table
            ->getEntity($id);
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

<?php

namespace App\Services\Datatables;

use App\Services\DefaultService;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class DatatablesService extends DefaultService
{
    /**
     * @var array
     */
    protected array $conditions = [];

    /**
     * @var array
     */
    protected array $joins = [];

    /**
     * @var int
     */
    protected int $limit = -1;

    /**
     * @var int
     */
    protected int $offset;

    /**
     * @var int
     */
    protected int $draw;

    /**
     * @var array
     */
    protected array $order;

    /**
     * @var array
     */
    protected array $search;

    /**
     * @var int
     */
    protected int $draft;

    /**
     * DatatablesService constructor.
     */
    public function __construct($controller)
    {
        parent::__construct($controller);
        set_time_limit(1200);

        $this->__table = TableRegistry::getTableLocator()
            ->get($this->getModel());
    }

    /**
     * Read DataTable parameters from query and set to attributes
     */
    protected function setDataTableFilters()
    {
        if (!empty($this->_controller->getRequest()->getQuery())) {
            $query = $this->_controller->getRequest()->getQuery();
            $this->limit = $query['length'];
            $this->offset = $query['start'];
            $this->draw = $query['draw'];
            $this->order = $query['order'] ?? [];
            $this->search = $query['search'];
            $this->draft = $query['draft'] ?? 1;
        }
    }

    /**
     * @param array $actions
     * @param $controller
     * @param int|null $id
     * @return array
     */
    protected function verifyHasPermissionActions(array $actions, $controller = null, int $id = null) :array
    {
        $links = [];
        foreach ($actions as $action) {
            $links[$action] = $this->hasPermission($action, $controller, $id);
        }
        return $links;
    }

    /**
     * @param string $action
     * @param string|null $controller
     * @param int|null $id
     * @return false|string
     */
    protected function hasPermission(string $action, string $controller = null, int $id = null)
    {
        $permissions = $this->_userSession->level->levels_permissions;
        $controller = $controller ?? $this->_request->getParam("controller");
        $prefix = strtolower($this->_request->getParam("prefix"));
        foreach ($permissions as $permission) {
            if (
                $this->_userSession->super
                ||
                (
                    strtolower($permission->prefix) == $prefix
                    &&
                    strtolower($permission->controller) == strtolower($controller)
                    &&
                    strtolower($permission->action) == strtolower($action)
                )
            ) {
                return Router::url([
                    'controller' => $controller,
                    'action' => $action,
                    $id
                ], true);
            }
        }
        return false;
    }
}

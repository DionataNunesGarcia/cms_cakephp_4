<?php

namespace App\Services\Datatables;

use App\Services\DefaultService;
use Cake\ORM\TableRegistry;

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
}

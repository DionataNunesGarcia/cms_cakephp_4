<?php

namespace App\Services\Datatables;

use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\Routing\Router;

class UsersDatatablesService extends DatatablesService
{
    public function __construct(Controller $controller)
    {
        $this->setModel('Users');
        parent::__construct($controller);
    }

    public function getResults()
    {
        try {
            $this->setDataTableFilters();
            $this->addSortCondition();
            $this->setConditions();
            $query = $this->getSearchQuery();
            $total = $query->count();
            $results = $query->toArray();

            $response = $this->handleResponse($results);

            return [
                "draw" => $this->draw ? $this->draw : 1,
                "recordsTotal" => $total,
                "recordsFiltered" => $total,
                "data" => $response
            ];
        } catch (\Exception $ex) {
            return [
                "draw" => $this->draw,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ];
        }
    }

    /**
     * Sort by DataTable column
     */
    private function addSortCondition()
    {
        $target = $this->getModel() . '.created';
        $method = 'DESC';

        if (!empty($this->order)) {

//            $dataTableColumnNumber = $this->order[0]["column"];
//
//            if (isset($this->sortableColumns[$dataTableColumnNumber])) {
//
//                $target = $this->sortableColumns[$dataTableColumnNumber];
//                $method = mb_strtoupper($this->order[0]["dir"]);
//            }
        }

        $this->order = [
            $target => $method
        ];
    }

    private function setConditions()
    {
        $this->conditions["{$this->getModel()}.status !="] = StatusEnum::EXCLUDED;
        $this->conditions["{$this->getModel()}.super"] = FALSE;
    }

    private function getSearchQuery()
    {
        $query = $this->__table
            ->find('list', [
                'keyField' => function($q) {},
                'valueField' => function($q) {
                    return $q;
                },
            ])
            ->where($this->conditions)
            ->contain($this->getContains())
            ->order($this->order);

        if ($this->limit > 0) {
            $query
                ->limit($this->limit)
                ->offset($this->offset);
        }

        return $query;
    }

    /**
     * @param array $results
     * @return array
     */
    private function handleResponse(array $results) :array
    {
        $router = Router::url('/', true);
        $response = [];
        foreach ($results as $item) {
            $response[] = [
                'id' => $item->id,
                'avatar' => $item->avatar ? $item->avatar->file : "{$router}img/user-default.png",
                'user' => $item->user,
                'level' => $item->level->name,
                'status' => $item->situation->name,
                'created' => $item->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
                'actions' => $this->verifyHasPermissionActions(['edit', 'delete'], 'Users', $item->id),
            ];
        }
        return $response;
    }

    public function getContains()
    {
        return [
            'Levels',
            'Avatar',
            'Situation'
        ];
    }

}

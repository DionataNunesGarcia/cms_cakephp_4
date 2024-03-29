<?php

namespace App\Services\Datatables;

use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\Routing\Router;

class LevelsDatatablesService extends DatatablesService
{
    public function __construct(Controller $controller)
    {
        $this->setModel('Levels');
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
        $response = [];
        foreach ($results as $item) {
            $users = count($item->users);
            $response[] = [
                'id' => $item->id,
                'name' => $item->name,
                'users' => $users,
                'created' => $item->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
                'actions' => [
                    'edit' => $this->hasPermission('edit', 'Levels', $item->id),
                    'delete' => $users ? false : $this->hasPermission('delete', 'Levels', $item->id),
                ],
            ];
        }
        return $response;
    }

    public function getContains()
    {
        return [
            'Users'
        ];
    }

}

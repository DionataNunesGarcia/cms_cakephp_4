<?php

namespace App\Services\Datatables;

use App\Utils\Enum\LogsChangeTypesEnum;
use App\Utils\Enum\ParameterTypesFilter;
use App\Utils\TranslateControllerActions;
use Cake\Controller\Controller;
use Cake\Routing\Router;

class LogsChangeDatatablesService extends DatatablesService
{
    /**
     * @return array[]
     */
    protected array $_customFields = [
        "users_id[]" => [
            'field' => 'Users.id',
            'type' => ParameterTypesFilter::IN,
        ],
        "dates_start_end" => [
            'field' => 'LogsChange.created',
            'type' => ParameterTypesFilter::DATE_RANGE,
        ],
    ];

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('LogsChange');
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function getResults() :array
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
        $this->setCustomFilters();
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
            $item->created = $item->created->i18nFormat('dd/MM/yyyy HH:mm:ss');
            $item->table = TranslateControllerActions::translateController($item->table_name);
            $item->type = LogsChangeTypesEnum::getType($item->action_type);
            $item->new_value_json = json_decode($item->new_value, JSON_OBJECT_AS_ARRAY);
            $item->old_value_json = json_decode($item->old_value, JSON_OBJECT_AS_ARRAY);
            $response[] = [
                'user' => $item->user->user,
                'table' => $item->table,
                'type' => $item->type,
                'new_value' => $item->new_value_json,
                'old_value' => $item->old_value_json,
                'created' => $item->created,
                'entity' => $item,
                'actions' => $this->verifyHasPermissionActions(['view'], 'LogsChange', $item->id),
            ];
        }
        return $response;
    }

    /**
     * @return string[]
     */
    public function getContains() :array
    {
        return [
            'Users'
        ];
    }

}

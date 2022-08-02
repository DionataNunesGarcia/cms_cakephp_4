<?php

namespace App\Services\Datatables;

use App\Utils\Enum\ParameterTypesFilter;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\Routing\Router;

class BlogsDatatablesService extends DatatablesService
{
    /**
     * @return array[]
     */
    protected array $_customFields = [
        "title" => [
            'field' => 'Blogs.title',
            'type' => ParameterTypesFilter::LIKE,
        ],
        "blog_category_id" => [
            'field' => 'Blogs.blog_category_id',
            'type' => ParameterTypesFilter::EQUAL,
        ],
    ];

    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        $this->setModel('Blogs');
        parent::__construct($controller);
    }

    /**
     * @param bool $onlyOwn
     * @return array
     */
    public function getResults(bool $onlyOwn = false) :array
    {
        try {
            $this->setDataTableFilters();
            $this->addSortCondition();
            $this->setConditions($onlyOwn);
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

    private function setConditions($onlyOwn)
    {
        $this->conditions["{$this->getModel()}.status !="] = StatusEnum::EXCLUDED;
        if ($onlyOwn) {
            $this->conditions["{$this->getModel()}.user_id"] = $this->_userSession['id'];
        }
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
            $response[] = [
                'id' => $item->id,
                'title' => $item->title,
                'subtitle' => $item->subtitle,
                'category' => $item->blogs_category->name,
                'user' => $item->user->user,
                'user_avatar' => $item->user->avatar
                    ? '..' . DS . 'Uploads' . DS . $item->user->avatar->filename
                    : DS . 'img' . DS . 'user-default.png',
                'created' => $item->created->i18nFormat('dd/MM/yyyy HH:mm:ss'),
                'actions' => $this->getActions($item->id),
            ];
        }
        return $response;
    }

    /**
     * @param int $id
     * @return array
     */
    private function getActions(int $id) :array
    {
        $edit = $this->hasPermission('edit', $this->getModel(), $id);
        $delete = $this->hasPermission('delete', $this->getModel(), $id);
        $actions['edit'] = $edit ?: $this->hasPermission('editYourContents', $this->getModel(), $id);
        $actions['delete'] = $delete ?: $this->hasPermission('deleteYourContents', $this->getModel(), $id);
        return $actions;
    }

    /**
     * @return string[]
     */
    public function getContains() :array
    {
        return [
            'BlogsCategories',
            'Users' => [
                'Avatar'
            ],
        ];
    }
}

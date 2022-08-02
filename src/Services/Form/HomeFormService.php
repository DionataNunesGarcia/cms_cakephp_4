<?php

namespace App\Services\Form;

use App\Model\Entity\User;
use App\Services\DefaultService;
use App\Utils\Enum\StatusEnum;
use Cake\Controller\Controller;
use Cake\I18n\FrozenTime;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class HomeFormService extends DefaultService
{
    /**
     * @param Controller $controller
     */
    public function __construct(Controller $controller)
    {
        parent::__construct($controller);
    }

    /**
     * @return array
     */
    public function getCounts() :array
    {
        return [
            'users' => self::getCount('Users', ['status !=' => StatusEnum::EXCLUDED]),
            'blogs' => self::getCount('Blogs', ['status !=' => StatusEnum::EXCLUDED]),
        ];
    }

    /**
     * @return array
     */
    public function getLatestBlogs() :array
    {
        $conditions['Blogs.status !='] = StatusEnum::EXCLUDED;
        if (!$this->hasPermission('index', 'Blogs')) {
            $conditions['Blogs.user_id'] = $this->_userSession['id'];
        }
        return self::getTableLocator('Blogs')
            ->find()
            ->where($conditions)
            ->contain([
                'BlogsCategories'
            ])
            ->orderDesc('Blogs.created')
            ->limit(5)
            ->toArray();
    }
}

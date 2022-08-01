<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogsCategoriesFixture
 */
class BlogsCategoriesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2022-08-01 14:26:47',
                'modified' => '2022-08-01 14:26:47',
            ],
        ];
        parent::init();
    }
}

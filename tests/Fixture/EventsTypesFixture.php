<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsTypesFixture
 */
class EventsTypesFixture extends TestFixture
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
                'title' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'color' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-07 16:41:39',
                'modified' => '2022-08-07 16:41:39',
            ],
        ];
        parent::init();
    }
}

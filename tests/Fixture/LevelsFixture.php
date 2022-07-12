<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LevelsFixture
 */
class LevelsFixture extends TestFixture
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
                'status' => 1,
                'deletable' => 1,
                'created' => '2022-07-12 03:22:08',
                'modified' => '2022-07-12 03:22:08',
            ],
        ];
        parent::init();
    }
}

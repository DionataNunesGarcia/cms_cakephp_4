<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LogsAccessFixture
 */
class LogsAccessFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'logs_access';
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
                'user_id' => 'Lorem ipsum dolor sit amet',
                'ip' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-07-12 03:25:19',
            ],
        ];
        parent::init();
    }
}

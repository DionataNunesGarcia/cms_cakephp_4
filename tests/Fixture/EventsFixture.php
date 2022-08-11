<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsFixture
 */
class EventsFixture extends TestFixture
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
                'details' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'event_type_id' => 1,
                'start' => '2022-08-07 17:50:26',
                'end' => '2022-08-07 17:50:26',
                'all_day' => 1,
                'status' => 1,
                'event_status' => 'Lorem ipsum dolor sit amet',
                'foreign_key' => 1,
                'model' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-08-07 17:50:26',
                'modified' => '2022-08-07 17:50:26',
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SystemParametersFixture
 */
class SystemParametersFixture extends TestFixture
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
                'social_reason' => 'Lorem ipsum dolor sit amet',
                'fantasy_name' => 'Lorem ipsum dolor sit amet',
                'cnpj_cpf' => 'Lorem ipsum dolor ',
                'generate_access_logs' => 1,
                'generate_change_log' => 1,
                'emails' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'created' => '2022-07-12 03:19:27',
                'modified' => '2022-07-12 03:19:27',
            ],
        ];
        parent::init();
    }
}

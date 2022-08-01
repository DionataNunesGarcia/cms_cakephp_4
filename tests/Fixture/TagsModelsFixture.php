<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TagsModelsFixture
 */
class TagsModelsFixture extends TestFixture
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
                'tag_id' => 'Lorem ipsum dolor sit amet',
                'foreign_key' => 1,
                'model' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

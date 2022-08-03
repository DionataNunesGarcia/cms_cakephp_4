<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ContactsNewslettersFixture
 */
class ContactsNewslettersFixture extends TestFixture
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
                'email' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2022-08-02 22:26:48',
                'modified' => '2022-08-02 22:26:48',
            ],
        ];
        parent::init();
    }
}

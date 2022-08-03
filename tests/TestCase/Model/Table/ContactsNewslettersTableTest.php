<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactsNewslettersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactsNewslettersTable Test Case
 */
class ContactsNewslettersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactsNewslettersTable
     */
    protected $ContactsNewsletters;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ContactsNewsletters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ContactsNewsletters') ? [] : ['className' => ContactsNewslettersTable::class];
        $this->ContactsNewsletters = $this->getTableLocator()->get('ContactsNewsletters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ContactsNewsletters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ContactsNewslettersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

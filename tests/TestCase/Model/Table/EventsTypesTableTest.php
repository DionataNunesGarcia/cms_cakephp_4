<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsTypesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsTypesTable Test Case
 */
class EventsTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsTypesTable
     */
    protected $EventsTypes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EventsTypes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EventsTypes') ? [] : ['className' => EventsTypesTable::class];
        $this->EventsTypes = $this->getTableLocator()->get('EventsTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EventsTypes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EventsTypesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

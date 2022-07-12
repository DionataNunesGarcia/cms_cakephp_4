<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogsAccessTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogsAccessTable Test Case
 */
class LogsAccessTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogsAccessTable
     */
    protected $LogsAccess;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LogsAccess',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LogsAccess') ? [] : ['className' => LogsAccessTable::class];
        $this->LogsAccess = $this->getTableLocator()->get('LogsAccess', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LogsAccess);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LogsAccessTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LogsAccessTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

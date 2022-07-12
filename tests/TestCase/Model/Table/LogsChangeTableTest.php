<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogsChangeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogsChangeTable Test Case
 */
class LogsChangeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogsChangeTable
     */
    protected $LogsChange;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LogsChange',
        'app.Users',
        'app.Records',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LogsChange') ? [] : ['className' => LogsChangeTable::class];
        $this->LogsChange = $this->getTableLocator()->get('LogsChange', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LogsChange);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LogsChangeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LogsChangeTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

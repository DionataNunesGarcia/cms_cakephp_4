<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LevelsPermissionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LevelsPermissionsTable Test Case
 */
class LevelsPermissionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LevelsPermissionsTable
     */
    protected $LevelsPermissions;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LevelsPermissions',
        'app.Levels',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LevelsPermissions') ? [] : ['className' => LevelsPermissionsTable::class];
        $this->LevelsPermissions = $this->getTableLocator()->get('LevelsPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LevelsPermissions);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LevelsPermissionsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\LevelsPermissionsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

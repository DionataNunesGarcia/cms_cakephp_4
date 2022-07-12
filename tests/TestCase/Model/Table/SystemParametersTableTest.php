<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SystemParametersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SystemParametersTable Test Case
 */
class SystemParametersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SystemParametersTable
     */
    protected $SystemParameters;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.SystemParameters',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('SystemParameters') ? [] : ['className' => SystemParametersTable::class];
        $this->SystemParameters = $this->getTableLocator()->get('SystemParameters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->SystemParameters);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SystemParametersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

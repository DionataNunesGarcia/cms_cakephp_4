<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AboutTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AboutTable Test Case
 */
class AboutTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AboutTable
     */
    protected $About;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.About',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('About') ? [] : ['className' => AboutTable::class];
        $this->About = $this->getTableLocator()->get('About', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->About);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AboutTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

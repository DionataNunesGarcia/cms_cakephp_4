<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestimonialsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestimonialsTable Test Case
 */
class TestimonialsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TestimonialsTable
     */
    protected $Testimonials;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Testimonials',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Testimonials') ? [] : ['className' => TestimonialsTable::class];
        $this->Testimonials = $this->getTableLocator()->get('Testimonials', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Testimonials);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TestimonialsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

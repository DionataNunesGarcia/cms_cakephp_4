<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\RegisterLogChangeBehavior;
use Cake\ORM\Table;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\RegisterLogChangeBehavior Test Case
 */
class RegisterLogChangeBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Behavior\RegisterLogChangeBehavior
     */
    protected $RegisterLogChange;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $table = new Table();
        $this->RegisterLogChange = new RegisterLogChangeBehavior($table);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RegisterLogChange);

        parent::tearDown();
    }
}

<?php

namespace Renatio\Todos\Tests\Behaviors;

use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;
use Renatio\Todos\Tests\TestCase;

/**
 * Class TaskPriorityTest
 * @package Renatio\Todos\Tests\Behaviors
 */
class TaskPriorityTest extends TestCase
{

    /**
     * @var
     */
    protected $task;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $list = factory(TodoList::class)->create();
        $this->task = factory(Task::class)->create([
            'list' => $list,
            'priority' => 5,
        ]);
    }

    /** @test */
    public function it_returns_priority_options()
    {
        $this->assertCount(5, $this->task->getPriorityOptions());
    }

    /** @test */
    public function it_returns_icon_for_given_priority()
    {
        $this->assertEquals('oc-icon-angle-double-down', $this->task->icon());
    }

    /** @test */
    public function it_returns_green_color_for_low_priority_tasks()
    {
        $this->assertEquals('#006400', $this->task->iconColor());
    }

    /** @test */
    public function it_returns_red_color_for_high_priority_tasks()
    {
        $this->task->priority = 1;

        $this->assertEquals('#cc0000', $this->task->iconColor());
    }

}
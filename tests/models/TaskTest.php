<?php

namespace Renatio\Todos\Tests\Models;

use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;
use Renatio\Todos\Tests\TestCase;
use System\Models\File;

/**
 * Class TaskTest
 * @package Renatio\Todos\Tests\Models
 */
class TaskTest extends TestCase
{

    /** @test */
    public function it_creates_task()
    {
        $task = factory(Task::class)->create();

        $this->assertEquals(1, $task->id);
    }

    /** @test */
    public function it_validates_name()
    {
        $list = factory(Task::class)->make();

        $this->assertArrayHasKey('name', $list->rules);
        $this->assertEquals('required', $list->rules['name']);
    }

    /** @test */
    public function it_is_sortable()
    {
        $task1 = factory(Task::class)->create();
        $task2 = factory(Task::class)->create();

        $this->assertEquals(1, $task1->fresh()->sort_order);
        $this->assertEquals(2, $task2->fresh()->sort_order);
    }

    /** @test */
    public function it_belongs_to_list()
    {
        $task = new Task;

        $this->assertArrayHasKey('list', $task->belongsTo);
        $this->assertContains(TodoList::class, $task->belongsTo['list']);
    }

    /** @test */
    public function it_attach_many_attachments()
    {
        $task = new Task;

        $this->assertArrayHasKey('attachments', $task->attachMany);
        $this->assertContains(File::class, $task->attachMany['attachments']);
    }

    /** @test */
    public function it_can_be_completed()
    {
        $task = factory(Task::class)->create();

        $task->complete();

        $this->assertNotNull($task->completed_at);
    }

    /** @test */
    public function it_can_be_reopened()
    {
        $task = factory(Task::class)->create();
        $task->complete();

        $task->reopen();

        $this->assertNull($task->completed_at);
    }

    /** @test */
    public function it_can_be_scoped_to_query_only_completed_tasks()
    {
        $tasks = factory(Task::class, 2)->create();

        $tasks->first()->complete();

        $this->assertEquals(1, Task::completed()->count());
    }

    /** @test */
    public function it_can_be_scoped_to_query_only_open_tasks()
    {
        $tasks = factory(Task::class, 2)->create();

        $tasks->first()->complete();

        $this->assertEquals(1, Task::uncompleted()->count());
    }

    /** @test */
    public function it_gets_priority_options()
    {
        $this->assertCount(5, Task::getPriorityOptions());
    }

}
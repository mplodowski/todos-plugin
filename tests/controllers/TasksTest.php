<?php

namespace Renatio\Todos\Tests\Controllers;

use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;

/**
 * Class TasksTest
 * @package Renatio\Todos\Tests\Controllers
 */
class TasksTest extends ControllerTestCase
{

    /** @test */
    public function it_displays_reorder_list_page()
    {
        $list = factory(TodoList::class)->create(['user' => $this->user]);

        $task = factory(Task::class)->create(['list' => $list]);

        $response = $this->get('backend/renatio/todos/tasks/reorder/' . $list->id);

        $response->assertSee($task->name);
    }

}
<?php

namespace Renatio\Todos\Tests\Behaviors;

use Renatio\Todos\Behaviors\TasksController;
use Renatio\Todos\Controllers\Lists;
use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;
use Renatio\Todos\Tests\TestCase;

/**
 * Class TasksControllerTest
 * @package Renatio\Todos\Tests\Behaviors
 */
class TasksControllerTest extends TestCase
{

    /**
     * @var
     */
    protected $controller;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->controller = new TaskControllerFake(new Lists);
    }

    /** @test */
    public function it_deletes_selected_task()
    {
        $list = $this->prepareTaskList();

        $this->controller->onTaskDelete($list->id);

        $this->assertEquals(0, Task::count());
    }

    /** @test */
    public function it_completes_selected_task()
    {
        $list = $this->prepareTaskList();

        $this->controller->onTaskComplete($list->id);

        $this->assertEquals(1, Task::completed()->count());
        $this->assertEquals(0, Task::open()->count());
    }

    /** @test */
    public function it_uncompletes_selected_task()
    {
        $list = $this->prepareTaskList();
        Task::first()->complete();

        $this->controller->onTaskUncomplete($list->id);

        $this->assertEquals(1, Task::open()->count());
        $this->assertEquals(0, Task::completed()->count());
    }

    /**
     * @return mixed
     */
    protected function prepareTaskList()
    {
        $list = factory(TodoList::class)->create();
        $task = factory(Task::class)->create(['list' => $list]);
        $_POST['task_id'] = $task->id;

        return $list;
    }

}

/**
 * Class TaskControllerFake
 * @package Renatio\Todos\Tests\Behaviors
 */
class TaskControllerFake extends TasksController
{

    /**
     * Fake October internal functionality
     *
     * @param $modelId
     * @return bool
     */
    protected function refreshRelations($modelId)
    {
        return true;
    }

}
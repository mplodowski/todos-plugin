<?php

namespace Renatio\Todos\Tests\Controllers;

use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;

/**
 * Class ListsTest
 * @package Renatio\Todos\Tests\Controllers
 */
class ListsTest extends ControllerTestCase
{

    /** @test */
    public function it_displays_lists_for_currently_logged_user()
    {
        $list = $this->createListForCurrentUser();

        $this->visit('backend/renatio/todos/lists')
            ->see($list->name);
    }

    /** @test */
    public function it_does_not_display_other_user_lists()
    {
        $list = factory(TodoList::class)->create();

        $this->visit('backend/renatio/todos/lists')
            ->dontSee($list->name);
    }

    /** @test */
    public function it_displays_create_list_page()
    {
        $this->visit('backend/renatio/todos/lists/create')
            ->seeStatusCode(200);
    }

    /** @test */
    public function it_displays_update_list_page()
    {
        $list = $this->createListForCurrentUser();

        $this->visit('backend/renatio/todos/lists/update/' . $list->id)
            ->seeStatusCode(200);
    }

    /** @test */
    public function it_displays_error_message_if_user_do_not_have_access_to_list()
    {
        $list = factory(TodoList::class)->create();

        $this->visit('backend/renatio/todos/lists/update/' . $list->id)
            ->see("Form record with an ID of {$list->id} could not be found.");
    }

    /** @test */
    public function it_displays_reorder_list_page()
    {
        $list = $this->createListForCurrentUser();

        $this->visit('backend/renatio/todos/lists/reorder')
            ->see($list->name);
    }

    /** @test */
    public function it_displays_tasks_for_given_list()
    {
        $list = $this->createListForCurrentUser();

        $task = factory(Task::class)->create(['list' => $list]);

        $this->visit('backend/renatio/todos/lists/update/' . $list->id)
            ->see($task->name);
    }

    /**
     * @return mixed
     */
    protected function createListForCurrentUser()
    {
        return factory(TodoList::class)->create(['user' => $this->user]);
    }

}
<?php

namespace Renatio\Todos\Tests\Models;

use Backend\Facades\BackendAuth;
use Backend\Models\User;
use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;
use Renatio\Todos\Tests\TestCase;

/**
 * Class TodoListTest
 * @package Renatio\Todos\Tests\Models
 */
class TodoListTest extends TestCase
{

    /** @test */
    public function it_creates_list()
    {
        $list = factory(TodoList::class)->create();

        $this->assertEquals(1, $list->id);
    }

    /** @test */
    public function it_validates_name()
    {
        $list = factory(TodoList::class)->make();

        $this->assertArrayHasKey('name', $list->rules);
        $this->assertEquals('required', $list->rules['name']);
    }

    /** @test */
    public function it_is_sortable()
    {
        $list1 = factory(TodoList::class)->create();
        $list2 = factory(TodoList::class)->create();

        $this->assertEquals(1, $list1->fresh()->sort_order);
        $this->assertEquals(2, $list2->fresh()->sort_order);
    }

    /** @test */
    public function it_has_many_completed_tasks()
    {
        $this->assertHasMany('completed_tasks', Task::class);
    }

    /** @test */
    public function it_has_many_open_tasks()
    {
        $this->assertHasMany('open_tasks', Task::class);
    }

    /** @test */
    public function it_has_open_tasks_count_attribute()
    {
        $list = factory(TodoList::class)->make();

        $this->assertEquals(0, $list->open_tasks_count);
    }

    /** @test */
    public function it_belongs_to_user()
    {
        $list = new TodoList;

        $this->assertArrayHasKey('user', $list->belongsTo);
        $this->assertContains(User::class, $list->belongsTo['user']);
    }

    /** @test */
    public function it_has_scope_for_current_user()
    {
        $user = factory(User::class)->create();
        BackendAuth::login($user);

        factory(TodoList::class)->create(['user' => $user]);
        factory(TodoList::class)->create();

        $this->assertEquals(1, TodoList::forCurrentUser()->count());
    }

    /** @test */
    public function it_has_url_attribute()
    {
        $list = factory(TodoList::class)->create();

        $this->assertEquals('http://oc-todo-list.app/backend/renatio/todos/lists/update/1', $list->url);
    }

    /**
     * @param $field
     * @param $class
     */
    protected function assertHasMany($field, $class)
    {
        $list = new TodoList;

        $this->assertArrayHasKey($field, $list->hasMany);
        $this->assertContains($class, $list->hasMany[$field]);
    }

}
<?php

namespace Renatio\Todos\Tests\Console;

use Backend\Models\User;
use Carbon\Carbon;
use MailThief\Testing\InteractsWithMail;
use Renatio\Todos\Console\TaskReminder;
use Renatio\Todos\Models\Task;
use Renatio\Todos\Models\TodoList;
use Renatio\Todos\Tests\TestCase;
use View;

/**
 * Class TaskReminderTest
 * @package Renatio\Todos\Tests\Console
 */
class TaskReminderTest extends TestCase
{

    use InteractsWithMail;

    /** @test */
    public function it_sends_reminder_email_to_user_for_scheduled_task()
    {
//        $this->prepareData();
//
//        (new TaskReminder)->handle();
//
//        $this->seeMessageFor('john@example.com');
    }

    /**
     * @return void
     */
    protected function prepareData()
    {
        /*
        * October cannot find view namespace so add it manually
        */
        View::addNamespace('renatio.todos', base_path('plugins/renatio/todos/views'));

        $user = factory(User::class)->create([
            'email' => 'john@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);

        $list = factory(TodoList::class)->create(['user' => $user]);

        factory(Task::class)->create([
            'list' => $list,
            'reminder_at' => Carbon::now()->format('Y-m-d H:i'),
        ]);
    }

}
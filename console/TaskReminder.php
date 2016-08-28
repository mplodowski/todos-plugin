<?php

namespace Renatio\Todos\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Mail;
use Renatio\Todos\Models\Task;

/**
 * Class TaskReminder
 * @package Renatio\Todos\Console
 */
class TaskReminder extends Command
{

    /**
     * @var string
     */
    protected $name = 'task:reminder';

    /**
     * @var string
     */
    protected $description = 'Send reminder email for the task';

    /**
     * @return bool
     */
    public function fire()
    {
        foreach ($this->tasks() as $task) {
            $email = $task->list->user->email;
            $name = $task->list->user->full_name;

            Mail::queue('renatio.todos::mail.new_reminder', compact('task'), function ($message) use ($email, $name) {
                $message->to($email, $name);
            });
        }
    }

    /**
     * @return mixed
     */
    protected function tasks()
    {
        return Task::with('list.user')
            ->where('reminder_at', Carbon::now()->format('Y-m-d H:i'))
            ->open()
            ->get();
    }

}
<?php

namespace Renatio\Todos\Console;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
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
    protected $description = 'Send reminder email for the task.';

    /**
     * @return bool
     */
    public function handle()
    {
        foreach ($this->tasks() as $task) {
            $data = [
                'email' => $task->list->user->email,
                'username' => $task->list->user->full_name,
                'task_name' => $task->name,
                'task_url' => $task->list->url,
            ];

            /*
             * @todo
             * Temporary use send() instead of queue()
             * because of October bug of not setting subject
             */
            Mail::send('renatio.todos::mail.new_reminder', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['username']);
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
            ->uncompleted()
            ->get();
    }

}
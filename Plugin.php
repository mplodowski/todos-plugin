<?php

namespace Renatio\Todos;

use Backend\Facades\Backend;
use Renatio\Todos\Console\TaskReminder;
use System\Classes\PluginBase;

/**
 * Class Plugin
 * @package Renatio\Todos
 */
class Plugin extends PluginBase
{

    /**
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'renatio.todos::lang.plugin.name',
            'description' => 'renatio.todos::lang.plugin.description',
            'author' => 'Renatio',
            'icon' => 'icon-check-square-o',
        ];
    }

    /**
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'todos' => [
                'label' => 'renatio.todos::lang.navigation.todos',
                'icon' => 'icon-check-square-o',
                'url' => Backend::url('renatio/todos/lists'),
                'permissions' => ['renatio.todos.*'],
                'order' => 500,
            ],
        ];
    }

    /**
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'renatio.todos.access_todos' => [
                'label' => 'renatio.todos::lang.permissions.access_todos',
                'tab' => 'renatio.todos::lang.permissions.tab',
            ],
        ];
    }

    /**
     * @return array
     */
    public function registerMailTemplates()
    {
        return [
            'renatio.todos::mail.new_reminder' => 'Task reminder email.',
        ];
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommand('task.reminder', TaskReminder::class);
    }

    /**
     * @param $schedule
     */
    public function registerSchedule($schedule)
    {
        $schedule->command('task:reminder')->everyMinute();
    }

}
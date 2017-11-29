<?php

namespace Renatio\Todos\Behaviors;

use Backend\Classes\ControllerBehavior;
use Renatio\Todos\Models\Task;

/**
 * Class TasksController
 * @package Renatio\Todos\Behaviors
 */
class TasksController extends ControllerBehavior
{

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskDelete($listId)
    {
        Task::findOrFail(post('task_id'))->delete();

        return $this->refreshRelations($listId);
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskComplete($listId)
    {
        Task::findOrFail(post('task_id'))->complete();

        return $this->refreshRelations($listId);
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskReopen($listId)
    {
        Task::findOrFail(post('task_id'))->reopen();

        return $this->refreshRelations($listId);
    }

    /**
     * @param $modelId
     * @return mixed
     */
    protected function refreshRelations($modelId)
    {
        $list = $this->controller->formFindModelObject($modelId);

        $this->controller->initForm($list);
        $this->controller->initRelation($list, 'open_tasks');
        $this->controller->initRelation($list, 'completed_tasks');

        return array_merge(
            $this->controller->relationRefresh('open_tasks'),
            $this->controller->relationRefresh('completed_tasks')
        );
    }

}
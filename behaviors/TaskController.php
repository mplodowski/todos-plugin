<?php

namespace Renatio\Todos\Behaviors;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use October\Rain\Extension\ExtensionBase;
use Renatio\Todos\Models\Task;

/**
 * Class TaskController
 * @package Renatio\Todos\Behaviors
 */
class TaskController extends ExtensionBase
{

    /**
     * @var
     */
    protected $controller;

    /**
     * @param $controller
     */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskDelete($listId)
    {
        try {
            Task::findOrFail(post('task_id'))->delete();
        } catch (ModelNotFoundException $e) {
        }

        return $this->refreshRelations($listId);
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskComplete($listId)
    {
        try {
            Task::findOrFail(post('task_id'))->complete();
        } catch (ModelNotFoundException $e) {
        }

        return $this->refreshRelations($listId);
    }

    /**
     * @param $listId
     * @return mixed
     */
    public function onTaskUncomplete($listId)
    {
        try {
            Task::findOrFail(post('task_id'))->uncomplete();
        } catch (ModelNotFoundException $e) {
        }

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
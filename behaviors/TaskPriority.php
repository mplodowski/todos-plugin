<?php

namespace Renatio\Todos\Behaviors;

use October\Rain\Database\ModelBehavior;

/**
 * Class TaskPriority
 * @package Renatio\Todos\Behaviors
 */
class TaskPriority extends ModelBehavior
{

    /**
     * @return array
     */
    public function getPriorityOptions()
    {
        return [
            1 => trans('renatio.todos::lang.priority.highest'),
            2 => trans('renatio.todos::lang.priority.high'),
            3 => trans('renatio.todos::lang.priority.normal'),
            4 => trans('renatio.todos::lang.priority.low'),
            5 => trans('renatio.todos::lang.priority.lowest'),
        ];
    }

    /**
     * @return mixed
     */
    public function getPriorityValueAttribute()
    {
        return $this->getPriorityOptions()[$this->model->priority];
    }

    /**
     * @return string
     */
    public function icon()
    {
        return $this->icons()[$this->model->priority];
    }

    /**
     * @return string
     */
    public function iconColor()
    {
        if ($this->model->priority < 3) {
            return '#cc0000';
        }

        return '#006400';
    }

    /**
     * @return array
     */
    protected function icons()
    {
        return [
            1 => 'oc-icon-angle-double-up',
            2 => 'oc-icon-angle-up',
            3 => '',
            4 => 'oc-icon-angle-down',
            5 => 'oc-icon-angle-double-down',
        ];
    }

}
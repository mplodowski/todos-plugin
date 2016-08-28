<?php

namespace Renatio\Todos\Classes;

/**
 * Class TaskPriority
 * @package Renatio\Todos\Classes
 */
class TaskPriority
{

    /**
     * @return array
     */
    public static function options()
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
     * @param $priority
     * @return mixed
     */
    public static function icon($priority)
    {
        return static::icons()[$priority];
    }

    /**
     * @param $priority
     * @return string
     */
    public static function color($priority)
    {
        if ($priority < 3) {
            return '#cc0000';
        }

        return '#006400';
    }

    /**
     * @return array
     */
    public static function icons()
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
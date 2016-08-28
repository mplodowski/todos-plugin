<?php

namespace Renatio\Todos\Models;

use Model;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;
use Renatio\Todos\Classes\TaskPriority;
use Renatio\Todos\Traits\Completable;
use System\Models\File;

/**
 * Class Task
 * @package Renatio\Todos\Models
 */
class Task extends Model
{

    use Validation;
    use Sortable;
    use Completable;

    /**
     * @var string
     */
    public $table = 'renatio_todos_tasks';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * @var array
     */
    public $attributeNames = [
        'name' => 'renatio.todos::lang.field.name',
        'name' => 'renatio.todos::lang.field.name',
        'description' => 'renatio.todos::lang.field.description'
    ];

    /**
     * @var array
     */
    public $rules = [
        'name' => 'required|max:255',
        'description' => 'max:255',
    ];

    /**
     * @var array
     */
    public $belongsTo = [
        'list' => [
            TodoList::class,
            'key' => 'list_id',
        ],
    ];

    /**
     * @var array
     */
    public $attachMany = [
        'attachments' => [
            File::class,
            'public' => false,
        ],
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeCompleted($query)
    {
        return $query->whereNotNull('completed_at')
            ->orderBy('completed_at', 'desc');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOpen($query)
    {
        return $query->whereNull('completed_at')
            ->orderBy('sort_order', 'desc');
    }

    /**
     * @return array
     */
    public static function getPriorityOptions()
    {
        return TaskPriority::options();
    }

}
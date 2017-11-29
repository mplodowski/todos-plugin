<?php

namespace Renatio\Todos\Models;

use October\Rain\Database\Model;
use October\Rain\Database\Traits\Sortable;
use October\Rain\Database\Traits\Validation;
use Renatio\Todos\Behaviors\TaskPriority;
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
    public $implement = [
        TaskPriority::class,
    ];

    /**
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * @var array
     */
    public $attributeNames = [
        'name' => 'renatio.todos::lang.field.name',
    ];

    /**
     * @var array
     */
    public $rules = [
        'name' => 'required',
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
            ->latest('completed_at');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUncompleted($query)
    {
        return $query->whereNull('completed_at')
            ->latest('sort_order');
    }

}
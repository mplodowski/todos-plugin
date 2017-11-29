<?php

namespace Renatio\Todos\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Renatio\Todos\Models\TodoList;

/**
 * Class Tasks
 * @package Renatio\Todos\Controllers
 */
class Tasks extends Controller
{

    /**
     * @var array
     */
    public $requiredPermissions = ['renatio.todos.access_todos'];

    /**
     * @var array
     */
    public $implement = ['Backend.Behaviors.ReorderController'];

    /**
     * @var string
     */
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Renatio.Todos', 'lists', 'tasks');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function reorderExtendQuery($query)
    {
        $listId = $this->params[0];

        $list = TodoList::forCurrentUser()->findOrFail($listId);

        return $query->where('list_id', $list->id)->uncompleted();
    }

}
<?php

namespace Renatio\Todos\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use October\Rain\Exception\ApplicationException;
use Renatio\Todos\Behaviors\TasksController;

/**
 * Class Lists
 * @package Renatio\Todos\Controllers
 */
class Lists extends Controller
{

    /**
     * @var array
     */
    public $requiredPermissions = ['renatio.todos.access_todos'];

    /**
     * @var array
     */
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
        'Backend.Behaviors.ReorderController',
        TasksController::class,
    ];

    /**
     * @var string
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var string
     */
    public $relationConfig = 'config_relation.yaml';

    /**
     * @var string
     */
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Renatio.Todos', 'todos', 'lists');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $this->pageTitle = $this->formFindModelObject($id)->name;
        } catch (ApplicationException $e) {
            $this->handleError($e);
        }

        return $this->asExtension('FormController')->update($id);
    }

    /**
     * @param $model
     */
    public function formBeforeCreate($model)
    {
        $model->user_id = $this->user->id;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function listExtendQuery($query)
    {
        return $query->forCurrentUser()
            ->with('open_tasks')
            ->latest('sort_order');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function formExtendQuery($query)
    {
        return $query->forCurrentUser();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function reorderExtendQuery($query)
    {
        return $query->forCurrentUser()
            ->latest('sort_order');
    }

}
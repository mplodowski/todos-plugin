<?php

namespace Renatio\Todos\Updates;

use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

/**
 * Class CreateTasksTable
 * @package Renatio\Todos\Updates
 */
class CreateTasksTable extends Migration
{

    /**
     * @return void
     */
    public function up()
    {
        Schema::create('renatio_todos_tasks', function ($table) {
            $table->increments('id');
            $table->integer('list_id')->unsigned()->index()->nullable();
            $table->integer('sort_order')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->datetime('due_at')->nullable();
            $table->datetime('reminder_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->tinyInteger('priority');
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renatio_todos_tasks');
    }

}
<?php

namespace Renatio\Todos\Updates;

use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

/**
 * Class AlterDescriptionFieldInTasksTable
 * @package Renatio\Todos\Updates
 */
class AlterDescriptionFieldInTasksTable extends Migration
{

    /**
     * @return void
     */
    public function up()
    {
        Schema::table('renatio_todos_tasks', function ($table) {
            $table->text('description')->change();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::table('renatio_todos_tasks', function ($table) {
            $table->string('description')->change();
        });
    }

}
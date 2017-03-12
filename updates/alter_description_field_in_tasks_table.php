<?php

namespace Renatio\Todos\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class AlterDescriptionFieldInTasksTable extends Migration
{

    public function up()
    {
        Schema::table('renatio_todos_tasks', function ($table) {
            $table->text('description')->change();
        });
    }

    public function down()
    {
        Schema::table('renatio_todos_tasks', function ($table) {
            $table->string('description')->change();
        });
    }

}
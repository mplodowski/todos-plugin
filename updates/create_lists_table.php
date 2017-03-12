<?php

namespace Renatio\Todos\Updates;

use October\Rain\Database\Updates\Migration;
use Schema;

class CreateListsTable extends Migration
{

    public function up()
    {
        Schema::create('renatio_todos_lists', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('sort_order')->unsigned()->index()->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renatio_todos_lists');
    }

}
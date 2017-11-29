<?php

namespace Renatio\Todos\Updates;

use October\Rain\Database\Updates\Migration;
use October\Rain\Support\Facades\Schema;

/**
 * Class CreateListsTable
 * @package Renatio\Todos\Updates
 */
class CreateListsTable extends Migration
{

    /**
     * @return void
     */
    public function up()
    {
        Schema::create('renatio_todos_lists', function ($table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('sort_order')->unsigned()->index()->nullable();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('renatio_todos_lists');
    }

}
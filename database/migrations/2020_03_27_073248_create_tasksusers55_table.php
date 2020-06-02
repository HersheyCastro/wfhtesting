<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateTasksUsers55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('tasksusers55',function(Blueprint $table){
            $table->increments("id");
                        $table->integer("tasks55_id")->references("id")->on("tasks55");
                        $table->integer("users55_id")->references("id")->on("users55");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasksusers55');
    }

}
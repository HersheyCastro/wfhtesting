<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateTasks55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('tasks55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("name");
                        $table->string("description")->nullable();
                        $table->integer("targets55_id")->references("id")->on("targets55");
                        $table->string("color")->nullable();
                        $table->dateTime("duration_s");
            $table->dateTime("duration_e");
                        $table->decimal("percent", 15, 0)->nullable();
                        $table->integer("order")->nullable();
                        $table->integer("parent_id")->nullable();
                        $table->decimal("percent_completed", 15, 0)->nullable();
                        $table->integer("created_by")->nullable();
                        $table->string("active")->nullable();
                        $table->decimal("weight", 15, 0)->nullable();
                        $table->string("means_verification")->nullable();
                        $table->string("evaluation")->nullable();
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
        Schema::drop('tasks55');
    }

}
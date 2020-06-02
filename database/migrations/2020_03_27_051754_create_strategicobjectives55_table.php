<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateStrategicObjectives55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('strategicobjectives55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("strategic_objective_name");
                        $table->integer("created_by")->nullable();
                        $table->string("active")->nullable();
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
        Schema::drop('strategicobjectives55');
    }

}
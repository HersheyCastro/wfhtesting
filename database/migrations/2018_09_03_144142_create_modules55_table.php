<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateModules55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('modules55',function(Blueprint $table){
            $table->increments("id");
            $table->string("sModuleName");
            $table->string("sModuleCode");
            $table->string("sTable");
            $table->integer("permissions55_id")->references("id")->on("permissions55");
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
        Schema::drop('modules55');
    }

}
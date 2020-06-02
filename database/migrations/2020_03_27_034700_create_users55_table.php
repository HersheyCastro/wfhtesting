<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateUsers55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('users55',function(Blueprint $table){
            $table->increments("id");
            $table->string("firstname")->nullable();
            $table->string("middlename")->nullable();
            $table->string("lastname")->nullable();
            $table->string("username")->nullable();
            $table->string("email");
            $table->string("password");
            $table->integer("roles55_id")->references("id")->on("roles55")->nullable();
            $table->integer("division_id")->references("id")->on("division55")->nullable();
            $table->integer("employee_id")->nullable();
            $table->integer("position")->nullable();
            $table->string("remember_token")->nullable();
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
        Schema::drop('users55');
    }

}
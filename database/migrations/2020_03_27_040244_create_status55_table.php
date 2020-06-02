<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateStatus55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('status55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("status_name");
                        $table->string("description")->nullable();
                        $table->string("color")->nullable();
                        $table->integer("created_by")->nullable();
                        $table->integer("active")->nullable();
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
        Schema::drop('status55');
    }

}
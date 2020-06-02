<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateFiles55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('files55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("filename");
                        $table->text("description")->nullable();
                        $table->string("link");
                        $table->string("file")->nullable();
                        $table->integer("tasks55_id")->references("id")->on("tasks55");
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
        Schema::drop('files55');
    }

}
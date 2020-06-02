<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateIpcr55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('ipcr55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("ipcr_name");
                        $table->integer("semester");
                        $table->integer("year");
                        $table->integer("status55_id")->references("id")->on("status55")->nullable();
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
        Schema::drop('ipcr55');
    }

}
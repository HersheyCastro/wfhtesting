<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateTargets55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('targets55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("name");
                        $table->string("description")->nullable();
                        $table->integer("users55_id")->references("id")->on("users55");
                        $table->dateTime("duration_s");
            $table->dateTime("duration_e");
                        $table->decimal("percent", 15, 0)->nullable();
                        $table->integer("created_by")->nullable();
                        $table->string("active")->nullable();
                        $table->integer("successindicators55_id")->references("id")->on("successindicators55");
                        $table->integer("ipcr55_id")->references("id")->on("ipcr55");
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
        Schema::drop('targets55');
    }

}
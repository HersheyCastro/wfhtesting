<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateSuccessIndicators55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('successindicators55',function(Blueprint $table){
            $table->increments("id");
                        $table->string("success_indicator_name");
                        $table->integer("strategicobjectives55_id")->references("id")->on("strategicobjectives55");
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
        Schema::drop('successindicators55');
    }

}
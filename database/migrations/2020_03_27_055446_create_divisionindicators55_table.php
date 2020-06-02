<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateDivisionIndicators55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::create('divisionindicators55',function(Blueprint $table){
            $table->increments("id");
                        $table->integer("successindicators55_id")->references("id")->on("successindicators55");
                        $table->integer("division55_id")->references("id")->on("division55");
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
        Schema::drop('divisionindicators55');
    }

}
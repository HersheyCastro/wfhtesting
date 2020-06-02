<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActualdateSToTasks55 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks55',function($table){
            // $table->datetime('actualdate_s');
            $table->datetime('actualdate_s')->nullable($value = true);
            $table->datetime('actualdate_e')->nullable($value = true);
            $table->string('actual_verification')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

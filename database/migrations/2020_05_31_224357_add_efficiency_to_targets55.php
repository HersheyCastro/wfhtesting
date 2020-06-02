<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEfficiencyToTargets55 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('targets55', function($table){
            $table->decimal('efficiency', 5, 2);
            $table->decimal('quality', 5, 2);
            $table->decimal('timeliness', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('targets55', function($table){
            $table->dropColumn('efficiency');
            $table->dropColumn('quality');
            $table->dropColumn('timeliness');
           
        });
    }
}

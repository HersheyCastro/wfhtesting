<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class UpdateModules55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::table('modules55', function (Blueprint $table) {
           $table->dropColumn('permissions55_id')->nullable();
        });
        Schema::create('modules55_permissions55',function(Blueprint $table){
            $table->integer("modules55_id")->unsigned()->index();
            $table->foreign("modules55_id")->references("id")->on("modules55")->onDelete("cascade");
            $table->integer("permissions55_id")->unsigned()->index();
            $table->foreign("permissions55_id")->references("id")->on("permissions55")->onDelete("cascade");
            $table->integer("iBitIndex");
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
        Schema::table('modules55_permissions55', function (Blueprint $table) {
                $table->dropForeign(['modules55_id']);
                $table->dropForeign(['permissions55_id']);
            });
        Schema::drop('modules55_permissions55');
        Schema::table('modules55', function (Blueprint $table) {
                    $table->string('permissions55_id')->nullable()->after('id');
        });
    }

}
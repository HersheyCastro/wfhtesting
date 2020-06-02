<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class UpdateRoles55Table extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Model::unguard();
        Schema::table('roles55', function (Blueprint $table) {
           $table->dropColumn('modules55_id')->nullable();
        });
        Schema::create('roles55_modules55',function(Blueprint $table){
            $table->integer("roles55_id")->unsigned()->index();
            $table->foreign("roles55_id")->references("id")->on("roles55")->onDelete("cascade");
            $table->integer("modules55_id")->unsigned()->index();
            $table->foreign("modules55_id")->references("id")->on("modules55")->onDelete("cascade");
            $table->integer("iPermission");
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
         Schema::table('roles55_modules55', function (Blueprint $table) {
                        $table->dropForeign(['roles55_id']);
                        $table->dropForeign(['modules55_id']);
                    });
        Schema::drop('roles55_modules55');
        Schema::table('roles55', function (Blueprint $table) {
                    $table->string('modules55_id')->nullable()->after('id');
        });
    }

}
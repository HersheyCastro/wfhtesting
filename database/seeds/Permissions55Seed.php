<?php

use Illuminate\Database\Seeder;

class Permissions55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'sPermissionName'=>'Access','sPermissionCode'=>'access','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>2,'sPermissionName'=>'Create','sPermissionCode'=>'create','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>3,'sPermissionName'=>'Edit','sPermissionCode'=>'edit','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>4,'sPermissionName'=>'View','sPermissionCode'=>'view','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>5,'sPermissionName'=>'Delete','sPermissionCode'=>'delete','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>6,'sPermissionName'=>'Purge','sPermissionCode'=>'purge','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>7,'sPermissionName'=>'Revive','sPermissionCode'=>'revive','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Permissions55::create($item);
        }
    }

}

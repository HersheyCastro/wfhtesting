<?php

use Illuminate\Database\Seeder;

class Roles55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'bActive'=>'1','sRoleName'=>'Admin','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>2,'bActive'=>'1','sRoleName'=>'Client','created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Roles55::create($item);
        }
    }

}

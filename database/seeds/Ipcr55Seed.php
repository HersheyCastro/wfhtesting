<?php

use Illuminate\Database\Seeder;

class Ipcr55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'ipcr_name'=>'2020-1stSem','semester'=>1,'year'=>2020,'status55_id'=>1,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:32:39','updated_at'=>'2020-03-27 08:32:39','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Ipcr55::create($item);
        }
    }

}

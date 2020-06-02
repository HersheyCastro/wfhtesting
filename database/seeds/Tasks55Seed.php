<?php

use Illuminate\Database\Seeder;

class Tasks55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'name'=>'create','description'=>'create','targets55_id'=>1,'color'=>null,'duration_s'=>'2020-03-27 12:00:00','duration_e'=>'2020-03-27 23:59:59','percent'=>null,'order'=>null,'parent_id'=>null,'percent_completed'=>null,'created_by'=>null,'active'=>null,'weight'=>'50','means_verification'=>null,'evaluation'=>null,'created_at'=>'2020-03-27 09:35:21','updated_at'=>'2020-03-27 09:35:21','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Tasks55::create($item);
        }
    }

}

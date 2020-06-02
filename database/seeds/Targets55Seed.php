<?php

use Illuminate\Database\Seeder;

class Targets55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'name'=>'CRUD','description'=>null,'users55_id'=>1,'duration_s'=>'2020-03-27 12:00:00','duration_e'=>'2020-03-27 23:59:59','percent'=>null,'created_by'=>null,'active'=>null,'successindicators55_id'=>3,'ipcr55_id'=>1,'created_at'=>'2020-03-27 09:34:16','updated_at'=>'2020-03-27 09:34:16','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Targets55::create($item);
        }
    }

}

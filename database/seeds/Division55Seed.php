<?php

use Illuminate\Database\Seeder;

class Division55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'division_name'=>'PCMD','color'=>null,'created_by'=>1,'active'=>1,'created_at'=>'2020-03-27 08:26:46','updated_at'=>'2020-03-27 08:26:46','deleted_at'=>null],['id'=>2,'division_name'=>'FAD','color'=>null,'created_by'=>1,'active'=>1,'created_at'=>'2020-03-27 08:27:04','updated_at'=>'2020-03-27 08:27:04','deleted_at'=>null],['id'=>3,'division_name'=>'ETDD','color'=>null,'created_by'=>1,'active'=>1,'created_at'=>'2020-03-27 08:27:24','updated_at'=>'2020-03-27 08:27:24','deleted_at'=>null],['id'=>4,'division_name'=>'EUSTDD','color'=>null,'created_by'=>1,'active'=>1,'created_at'=>'2020-03-27 08:27:41','updated_at'=>'2020-03-27 08:27:41','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Division55::create($item);
        }
    }

}

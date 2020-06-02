<?php

use Illuminate\Database\Seeder;

class Status55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'status_name'=>'For Approval','description'=>null,'color'=>null,'created_by'=>null,'active'=>null,'created_at'=>'2020-03-27 08:30:47','updated_at'=>'2020-03-27 08:30:47','deleted_at'=>null],['id'=>2,'status_name'=>'Approved','description'=>null,'color'=>null,'created_by'=>null,'active'=>null,'created_at'=>'2020-03-27 08:31:04','updated_at'=>'2020-03-27 08:31:04','deleted_at'=>null],['id'=>3,'status_name'=>'Revision','description'=>null,'color'=>null,'created_by'=>null,'active'=>null,'created_at'=>'2020-03-27 08:31:18','updated_at'=>'2020-03-27 08:31:37','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Status55::create($item);
        }
    }

}

<?php

use Illuminate\Database\Seeder;

class DivisionIndicators55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'successindicators55_id'=>1,'division55_id'=>1,'created_at'=>'2020-03-27 08:28:06','updated_at'=>'2020-03-27 08:28:06','deleted_at'=>null],['id'=>2,'successindicators55_id'=>2,'division55_id'=>1,'created_at'=>'2020-03-27 08:28:22','updated_at'=>'2020-03-27 08:28:22','deleted_at'=>null],['id'=>3,'successindicators55_id'=>3,'division55_id'=>1,'created_at'=>'2020-03-27 08:28:36','updated_at'=>'2020-03-27 08:28:36','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\DivisionIndicators55::create($item);
        }
    }

}

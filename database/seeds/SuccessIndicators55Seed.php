<?php

use Illuminate\Database\Seeder;

class SuccessIndicators55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'success_indicator_name'=>'3-Year Information Systems Strategic Plan (ISSP) endorsed','strategicobjectives55_id'=>1,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 05:49:30','updated_at'=>'2020-03-27 05:49:30','deleted_at'=>null],['id'=>2,'success_indicator_name'=>'No. of reports packaged and submitted to appropriate agencies within the prescribed timeframe','strategicobjectives55_id'=>1,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:23:40','updated_at'=>'2020-03-27 08:23:40','deleted_at'=>null],['id'=>3,'success_indicator_name'=>'100% ICT resource requirement requested for purchase within the prescribed period','strategicobjectives55_id'=>2,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:24:11','updated_at'=>'2020-03-27 08:24:11','deleted_at'=>null],['id'=>4,'success_indicator_name'=>'% of new & ongoing IT projects implemented\/monitored in accordance with the approved timeline','strategicobjectives55_id'=>2,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:24:37','updated_at'=>'2020-03-27 08:24:37','deleted_at'=>null],['id'=>5,'success_indicator_name'=>'% of IT service requests rendered within the prescribed time','strategicobjectives55_id'=>4,'created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:25:13','updated_at'=>'2020-03-27 08:25:13','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\SuccessIndicators55::create($item);
        }
    }

}

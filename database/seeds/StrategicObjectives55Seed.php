<?php

use Illuminate\Database\Seeder;

class StrategicObjectives55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'strategic_objective_name'=>'Effective and Efficient Information Technology Resources (ITR) Management: Plans and Programs','created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 05:44:28','updated_at'=>'2020-03-27 05:44:28','deleted_at'=>null],['id'=>2,'strategic_objective_name'=>'\'Effective and Efficient Information Technology Resources (ITR) Management: Procurement and Deployment of ICT Resources\'','created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:22:05','updated_at'=>'2020-03-27 08:22:05','deleted_at'=>null],['id'=>3,'strategic_objective_name'=>'Effective and Efficient Information Technology Resources (ITR) Management: IT Projects implementation and Monitoring','created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:22:25','updated_at'=>'2020-03-27 08:22:25','deleted_at'=>null],['id'=>4,'strategic_objective_name'=>'Effective and Efficient Information Technology Resources (ITR) Management: Network Systems and Hardware Management','created_by'=>null,'active'=>'1','created_at'=>'2020-03-27 08:22:58','updated_at'=>'2020-03-27 08:22:58','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\StrategicObjectives55::create($item);
        }
    }

}

<?php

use Illuminate\Database\Seeder;

class Users55Seed extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        $items = [['id'=>1,'firstname'=>'Super Admin','email'=>'superadmin@email.com','password'=>'$2y$10$b51EEE2FnhmqRiDAy0sQx.MKx0REuYlFPqGQfHdvWVKjMVf1aCO1O','roles55_id'=>1,'remember_token'=>null,'created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null],['id'=>2,'firstname'=>'Client','email'=>'client@email.com','password'=>'$2y$10$pOfuiu1oC1TizGYwGKEJxOjnW8djs9AaLd\/QVYUP0PwpO7kLR0zMu','roles55_id'=>2,'remember_token'=>null,'created_at'=>'2020-03-27 03:47:00','updated_at'=>'2020-03-27 03:47:00','deleted_at'=>null]];

        foreach ($items as $item) {
            \App\Users55::create($item);
        }
    }

}

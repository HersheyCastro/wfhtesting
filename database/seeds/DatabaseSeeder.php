<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //$this->call(RoleSeed::class);
        //$this->call(UserSeed::class);
                $this->call(Permissions55Seed::class);
        $this->call(Modules55Seed::class);
        $this->call(Modules55Permissions55Seed::class);
        $this->call(Roles55Seed::class);
        $this->call(Roles55Modules55Seed::class);
        $this->call(Users55Seed::class);
        $this->call(Division55Seed::class);
        $this->call(Status55Seed::class);
        $this->call(StrategicObjectives55Seed::class);
        $this->call(SuccessIndicators55Seed::class);
        $this->call(DivisionIndicators55Seed::class);
        $this->call(Ipcr55Seed::class);
        $this->call(Targets55Seed::class);
        $this->call(Tasks55Seed::class);
        $this->call(TasksUsers55Seed::class);
        $this->call(Files55Seed::class);

    }
}
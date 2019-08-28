<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(AdministratorTableSeeder::class);
        $this->call(InstructorTableSeeder::class);
        $this->call(StudantTableSeeder::class);
        $this->call(PayMethodTableSeeder::class);
        $this->call(CategoryTableSeeder::class);*/
        $this->call(UtilityClassTableSeeder::class);
    }
}

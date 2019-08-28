<?php

use Illuminate\Database\Seeder;

class InstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \Illuminate\Support\Facades\DB::table('instructors')->insert([
                'id'=>0,
                'name' => 'Instrutor',
                'email' => 'instrutor@mooc.test',
                'username' => 'instrutor',
                'password' => 'IS_NOT_SET_PASSWORD',
                'status' => \Mooc\Enums\UserStatus::ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);

            print("Professor registrado");
        } catch (\Exception $e){
            print("Exception: {$e->getMessage()}");
        }
    }
}

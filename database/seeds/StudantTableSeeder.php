<?php

use Illuminate\Database\Seeder;

class StudantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \Illuminate\Support\Facades\DB::table('students')->insert([
                'id'=>0,
                'name' => 'Estudante',
                'email' => 'student@mooc.test',
                'username' => 'student',
                'password' => 'IS_NOT_SET_PASSWORD',
                'status' => \Mooc\Enums\UserStatus::ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);

            print("Estudate registrado");
        } catch (\Exception $e){
            print("Exception: {$e->getMessage()}");
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \Illuminate\Support\Facades\DB::table('administrators')->insert([
                'id'=>0,
                'name' => 'Administrador',
                'email' => 'administrador@mooc.test',
                'username' => 'administrador',
                'password' => 'IS_NOT_SET_PASSWORD',
                'status' => \Mooc\Enums\UserStatus::ACTIVE,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]);

            print("Administrador registrado");
        } catch (\Exception $e){
            print("Exception: {$e->getMessage()}");
        }
    }
}

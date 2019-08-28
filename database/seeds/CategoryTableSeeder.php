<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \Illuminate\Support\Facades\DB::table('categories')->insert(['id'=>env('CATEGORY_BLOG'),'name'=>'Categorias de Blog','slug'=>'qwe123ksdakls','parent_id'=>null,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null]);
            \Illuminate\Support\Facades\DB::table('categories')->insert(['id'=>env('CATEGORY_COURSES'),'name'=>'Categorias de Cursos','slug'=>'qwe123ksdaklz','parent_id'=>null,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null]);
            print("Categorias Registradas registrado");
        } catch (\Exception $e){
            print("Exception: {$e->getMessage()}");
        }
    }
}

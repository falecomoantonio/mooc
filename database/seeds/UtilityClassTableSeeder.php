<?php

use Illuminate\Database\Seeder;

class UtilityClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bases = [
            ['id'=>env('UTILITY_CLASSES_STATUS_SALES'),'name'=>'SalesStatusEnum','description'=>'Status de Vendas','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ['id'=>env('UTILITY_CLASSES_STATUS_COURSE'),'name'=>'CourseStatusEnum','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ['id'=>env('UTILITY_CLASSES_STATUS_SKU'),'name'=>'SkuStatusEnum','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ['id'=>env('UTILITY_CLASSES_STATUS_USER'),'name'=>'UserStatusEnum','created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null]
        ];
        try{
            foreach($bases as $item)
                \Illuminate\Support\Facades\DB::table('utility_classes')->insert($item);
        } catch (\Exception $e) {
            logger($e->getMessage());
        }
    }
}

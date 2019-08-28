<?php

use Illuminate\Database\Seeder;

class PayMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $methods = [
                ['id' => -1,'name' => 'Formas de Pagamentos','description' => 'Formas de Pagamento Aceito pela Plataforma','parent_id'=>null,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
                ['name' => 'Boleto','description' => 'Boleto','parent_id'=>-1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
                ['name' => 'Cartão de Crédito','description' => 'Cartão de Crédito','parent_id'=>-1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
                ['name' => 'Cartão de Débito','description' => 'Cartão de Débito','parent_id'=>-1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
                ['name' => 'Transferência Bancária','description' => 'Transferência Bancária','parent_id'=>-1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
                ['name' => 'Deposito em Envelope','description' => 'Deposito em Envelope','parent_id'=>-1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s'),'deleted_at'=>null],
            ];

            foreach($methods as $key => $payment)
            {
                \Illuminate\Support\Facades\DB::table('utility_classes')->insert($payment);
            }

        } catch (\Exception $e){
            logger($e->getMessage());
            print("Exception: {$e->getMessage()}");
        }
    }
}

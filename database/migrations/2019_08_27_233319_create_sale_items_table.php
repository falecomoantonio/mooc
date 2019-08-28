<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSaleItemsTable.
 */
class CreateSaleItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sale_items', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('sales_id');
            $table->integer('sku_id');
            $table->integer('sequence_number');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sku_id')->on('skus')->references('id');
            $table->foreign('sales_id')->on('sales')->references('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sale_items');
	}
}

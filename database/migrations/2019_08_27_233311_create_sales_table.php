<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSalesTable.
 */
class CreateSalesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('administrator_id');
            $table->integer('student_id');

            $table->integer('count_item');

            $table->integer('status_id');
            $table->string('code',128);
            $table->integer('pay_method');

            $table->string('os',1);
            $table->string('browser',1);
            $table->string('ip',40);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('administrator_id')->on('administrators')->references('id');
            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('pay_method')->on('utility_classes')->references('id');
            $table->foreign('status_id')->on('utility_classes')->references('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales');
	}
}

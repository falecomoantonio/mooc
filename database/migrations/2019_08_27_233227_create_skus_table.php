<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateSkusTable.
 */
class CreateSkusTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skus', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id');
            $table->integer('status_id');
            $table->decimal('price',10,2);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->on('utility_classes')->references('id');
            $table->foreign('course_id')
                  ->on('courses')
                  ->references('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skus');
	}
}

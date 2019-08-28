<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUtilityClassesTable.
 */
class CreateUtilityClassesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('utility_classes', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name',64);
            $table->string('description',500)->nullable();
            $table->integer('parent_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                  ->on('utility_classes')
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
		Schema::drop('utility_classes');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCategoriesTable.
 */
class CreateCategoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name',64);
            $table->string('slug',64)->unique();

            $table->integer('parent_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parent_id')
                  ->on('categories')
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
		Schema::drop('categories');
	}
}

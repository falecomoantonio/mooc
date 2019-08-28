<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCoursesTable.
 */
class CreateCoursesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('create_by');
            $table->integer('category_id');

            $table->string('title');
            $table->string('banner',50)->default('course-default.png');
            $table->text('description');
            $table->integer('duraction');
            $table->string('level',1);
            $table->integer('status_id');
            $table->string('type',1);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->on('utility_classes')->references('id');

            $table->foreign('create_by')
                ->on('administrators')
                ->references('id');

            $table->foreign('category_id')
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
		Schema::drop('courses');
	}
}

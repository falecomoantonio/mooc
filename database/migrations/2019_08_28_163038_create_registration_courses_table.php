<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRegistrationCoursesTable.
 */
class CreateRegistrationCoursesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registration_courses', function(Blueprint $table) {
            $table->increments('id');

            $table->integer('course_id');
            $table->integer('student_id');
            $table->integer('sale_id');

            $table->integer('shelf_life');
            $table->integer('status_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_id')->on('courses')->references('id');
            $table->foreign('student_id')->on('students')->references('id');
            $table->foreign('sale_id')->on('sales')->references('id');
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
		Schema::drop('registration_courses');
	}
}

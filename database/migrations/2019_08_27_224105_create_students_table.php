<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',120)->unique();
            $table->string('username',20)->nullable()->unique();
            $table->string('password');
            $table->string('photo',40)->default('user-default.png');
            $table->integer('status_id');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::drop('students');
    }
}

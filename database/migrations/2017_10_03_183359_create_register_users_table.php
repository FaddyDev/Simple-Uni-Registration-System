<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->string('phonenumber')->unique();
            $table->integer('id_number')->unique();
            $table->string('address');
            $table->string('photo');
            $table->string('birth_certificate');
            $table->string('result_certificate');
            $table->string('id_copy');
            $table->string('parentfullname');
            $table->string('parentphonenumber')->unique();
            $table->integer('parentid_number')->unique();
            $table->string('highschool');
            $table->integer('index_number');
            $table->integer('points');
            $table->integer('course_id')->unsigned();
            $table->integer('status');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_users');
    }
}

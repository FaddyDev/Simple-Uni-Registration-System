<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoreDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->unique();
            $table->string('reg_number')->unique();
            $table->integer('status');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('register_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('more_details');
    }
}

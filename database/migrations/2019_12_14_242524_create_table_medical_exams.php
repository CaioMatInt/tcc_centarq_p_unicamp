<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedicalExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->integer('user_id')->unsigned();
            $table->integer('town_hall_id')->unsigned();
            $table->integer('medical_exam_type_id')->unsigned();

            $table->foreign('town_hall_id')->references('id')->on('town_halls');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('medical_exam_type_id')->references('id')->on('medical_exam_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_exams');
    }
}

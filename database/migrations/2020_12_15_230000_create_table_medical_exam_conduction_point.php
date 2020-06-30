<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedicalExamConductionPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exam_conduction_point', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_exam_id')->unsigned();
            $table->foreign('medical_exam_id')->references('id')->on('medical_exams');
            $table->integer('conduction_point_id')->unsigned();
            $table->foreign('conduction_point_id')->references('id')->on('conduction_points');
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
        Schema::dropIfExists('medical_exam_conduction_point');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedicalExamMedicalTreatment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_exam_medical_treatment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_exam_id')->unsigned();
            $table->foreign('medical_exam_id')->references('id')->on('medical_exams');
            $table->integer('medical_treatment_id')->unsigned();
            $table->foreign('medical_treatment_id')->references('id')->on('medical_treatments');
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
        Schema::dropIfExists('medical_exam_medical_treatment');
    }
}

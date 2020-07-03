<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMedicalAppointmentConductionPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_appointment_conduction_point', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medical_appointment_id')->unsigned();
            $table->foreign('medical_appointment_id', 'conduction_point_medical_app')->references('id')->on('medical_appointments');
            $table->integer('conduction_point_id')->unsigned();
            $table->foreign('conduction_point_id', 'medical_app_conduction_point')->references('id')->on('conduction_points');
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
        Schema::dropIfExists('medical_appointment_conduction_point');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHealthUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('town_hall_id')->unsigned();
            $table->foreign('town_hall_id')->references('id')->on('town_halls');
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
        Schema::dropIfExists('town_hall');
    }
}

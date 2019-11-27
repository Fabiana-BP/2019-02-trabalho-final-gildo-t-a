<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ways', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('departure_city');
          $table->string('stop_city');
          $table->time('timetable');
          $table->unsignedBigInteger('vehicle_id');
          $table->float('price',8,2);
          $table->float('discount',8,2)->nullable();

          $table->timestamps();

          //chaves estrangeiras
          $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ways');
    }
}

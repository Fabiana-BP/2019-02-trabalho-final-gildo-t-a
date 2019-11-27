<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmchairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armchairs', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('way_id');
          $table->date('date_trip');
          $table->time('timetable');
          $table->integer('max_seats');
          $table->integer('available_seats');
          $table->timestamps();

          //chaves estrangeiras
          $table->foreign('way_id')->references('id')->on('ways');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('armchairs');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNocustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nocustomers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_trip');
            $table->integer('seat');
            $table->unsignedBigInteger('way_id');
            $table->timestamps();
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
        Schema::dropIfExists('nocustomers');
    }
}

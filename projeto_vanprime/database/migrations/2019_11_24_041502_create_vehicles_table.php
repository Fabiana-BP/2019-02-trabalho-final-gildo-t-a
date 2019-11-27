<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('company_id');
          $table->string('board',7)->unique();
          $table->unsignedBigInteger('category_id');
          $table->integer('max_seats');
          $table->text('image_bus')->nullable();

          $table->timestamps();

          //declaração chaves estrangeiras
          $table->foreign('company_id')->references('id')->on('companies');
          $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('way_id');
            $table->unsignedBigInteger('user_id');
            $table->date('date_trip');
            $table->float('cost',8,2);
            $table->string('type_pay');
            $table->BigInteger('cred_card_number')->nullable();
            $table->timestamps();

            //chaves estrangeiras
            $table->foreign('way_id')->references('id')->on('ways');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

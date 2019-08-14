<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('status');
            $table->string('estimatedtime');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('deliveryfee');
            $table->Integer('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment');
            $table->Integer('user_id');
            $table->foreign('user_id')->references('id')->on('user');


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
        Schema::dropIfExists('orders');
    }
}

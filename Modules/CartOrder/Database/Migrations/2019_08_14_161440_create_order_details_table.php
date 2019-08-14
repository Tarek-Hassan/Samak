<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantity');
            $table->string('price');
            $table->string('size');
            $table->string('cooked');
            $table->string('cutting');
            $table->string('cleaned');
            $table->Integer('order_id');
            $table->foreign('order_id')->references('id')->on('order');
            $table->Integer('categorydetails_id');
            $table->foreign('categorydetails_id')->references('id')->on('categoryDetails');
        

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
        Schema::dropIfExists('order_details');
    }
}

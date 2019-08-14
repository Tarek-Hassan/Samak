<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantity');
            $table->string('price');
            $table->string('size');
            $table->string('cooked');
            $table->string('cutting');
            $table->string('cleaned');
            $table->Integer('categorydetails_id');
            $table->foreign('categorydetails_id')->references('id')->on('categoryDetails');
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
        Schema::dropIfExists('carts');
    }
}

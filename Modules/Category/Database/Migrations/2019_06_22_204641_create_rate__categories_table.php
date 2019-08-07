<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rate')->nullable();
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
        Schema::dropIfExists('rate_categories');
    }
}

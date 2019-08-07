<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->string('large')->nullable();
            $table->string('medium')->nullable();
            $table->string('small')->nullable();
            $table->string('discount')->nullable();
            $table->string('quantity');
            $table->Integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('user')->onDelete('SET NULL');
            $table->Integer('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('SET NULL');

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
        Schema::dropIfExists('category_details');
    }
}

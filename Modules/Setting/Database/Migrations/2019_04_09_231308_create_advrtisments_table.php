<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvrtismentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advrtisments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleAr');
            $table->string('titleEn');
            $table->longText('descriptionAr');
            $table->longText('descriptionEn');
            $table->Integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('advrtisments');
    }
}

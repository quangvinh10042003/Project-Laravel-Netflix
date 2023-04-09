<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('timeline')->unique();
            $table->integer('film_id')->unsigned();
            $table->integer('release_id')->unsigned();
            $table->timestamps();
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('release_id')->references('id')->on('release_dates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('timelines');
    }
};

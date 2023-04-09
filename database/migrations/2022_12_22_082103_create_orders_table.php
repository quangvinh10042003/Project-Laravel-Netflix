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
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('order_note')->nullable();
            $table->string('cardNumber', 10);
            $table->string('chair');
            $table->integer('film_id')->unsigned();
            $table->integer('timeline_id')->unsigned();
            $table->integer('quantity');
            $table->integer('cvv');
            $table->integer('account_id')->unsigned(); 
            $table->tinyInteger('status')->default(0);
            $table->string('token')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('film_id')->references('id')->on('films');
            $table->foreign('timeline_id')->references('id')->on('timelines');
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
};

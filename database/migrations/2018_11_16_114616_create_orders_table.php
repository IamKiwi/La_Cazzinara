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
            $table->increments('id');
            $table->integer('id_pizza')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->string('price');
            $table->string('size');
            $table->string('quantity');
            $table->dateTime('ordered_at');
            $table->dateTime('status');
            $table->foreign('id_pizza')->references('id')->on('pizzas');
            $table->foreign('id_user')->references('id')->on('users');
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

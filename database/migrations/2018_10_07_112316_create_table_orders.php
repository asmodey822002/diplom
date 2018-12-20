<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->decimal('sum', 10, 2);
            $table->string('phone', 12);
            $table->string('address', 32);
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->decimal('price', 10, 2);
            $table->string('name', 32);
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('orders_items');
    }
}

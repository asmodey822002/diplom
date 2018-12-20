<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRabotaKartridjes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rabota_ks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 32);
            $table->timestamps();
        });
        Schema::create('rabota_kartridjes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('rabota_id')->unsigned();
            $table->integer('kartridjes_id')->unsigned();
            $table->timestamps();
            $table->foreign('rabota_id')
                    ->references('id')
                    ->on('rabota_ks')
                    ->onDelete('cascade');//добавляем каскадное удаление - при удалении в одном - удалится в связанных
            $table->foreign('kartridjes_id')
                    ->references('id')
                    ->on('kartridjes')
                    ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rabota_kartridjes');
        Schema::dropIfExists('rabota_ks');
    }
}

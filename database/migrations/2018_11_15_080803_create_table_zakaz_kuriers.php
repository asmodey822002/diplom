<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableZakazKuriers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakaz_kuriers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 32)->nullable();
            $table->string('surname', 32)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('email', 32)->unique()->nullable();
            $table->string('address', 128)->nullable();
            $table->string('kol_vo', 32)->nullable();
            $table->string('taim', 32)->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
        Schema::create('vizov_sosts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 32)->nullable();
            $table->timestamps();
        });
        Schema::create('kuriers_sosts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('vizov_sost_id')->unsigned();
            $table->integer('zakaz_kuriers_id')->unsigned();
            $table->timestamps();
            $table->foreign('vizov_sost_id')
                    ->references('id')
                    ->on('vizov_sosts')
                    ->onDelete('cascade');
            $table->foreign('zakaz_kuriers_id')
                    ->references('id')
                    ->on('zakaz_kuriers')
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
        Schema::dropIfExists('vizov_sost');
        Schema::dropIfExists('kuriers_sost');
        Schema::dropIfExists('zakaz_kuriers');
    }
}

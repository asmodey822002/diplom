<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableZakazSpecs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zakaz_specs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 32)->nullable();
            $table->string('surname', 32)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('email', 32)->nullable();
            $table->string('address', 128)->nullable();
            $table->string('opisanie', 32)->nullable();
            $table->string('taim', 32)->nullable();
            $table->integer('users_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
        
        Schema::create('specs_sosts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('vizov_sost_id')->unsigned();
            $table->integer('zakaz_spec_id')->unsigned();
            $table->timestamps();
            $table->foreign('vizov_sost_id')
                    ->references('id')
                    ->on('vizov_sosts')
                    ->onDelete('cascade');
            $table->foreign('zakaz_spec_id')
                    ->references('id')
                    ->on('zakaz_specs')
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
        Schema::dropIfExists('zakaz_specs');
        Schema::dropIfExists('specs_sosts');
    }
}

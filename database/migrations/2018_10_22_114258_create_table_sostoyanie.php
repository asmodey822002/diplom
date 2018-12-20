<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSostoyanie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials_tehniks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->longText('materials')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
        Schema::create('categories_tehs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 128);
            $table->timestamps();
        });
        Schema::create('models_kartridjes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('models', 128);
            $table->timestamps();
        });
        Schema::create('materials_kartridjes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->longText('materials')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });
        Schema::create('sostoyanies', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('sostoyanies', 32);
            $table->timestamps();
        });
        
        Schema::create('masters', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->decimal('price_kartridj_zapravka', 10, 2)->nullable();
            $table->decimal('price_kartridj_regeniraciya', 10, 2)->nullable();
            $table->decimal('nacenka_kartridj_zapravka', 10, 2)->nullable();
            $table->decimal('nacenka_kartridj_regeniraciya', 10, 2)->nullable();
            $table->decimal('price_remont', 10, 2)->nullable();
            $table->decimal('nacenka_remont', 10, 2)->nullable();
            $table->timestamps();
            $table->foreign('users_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 32)->nullable();
            $table->string('surname', 32)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('email', 32)->unique()->nullable();
            $table->string('address', 128)->nullable();
            $table->longText('dop')->nullable();
            $table->decimal('skidka', 10, 2)->nullable();
            $table->timestamps();
        });
        
        Schema::create('tehnikas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('categories_teh_id')->unsigned()->nullable();
            $table->string('models', 32)->nullable();
            $table->string('serial_number', 32)->nullable();
            $table->string('complaint', 128)->nullable();
            $table->integer('master_id')->unsigned()->nullable();
            $table->longText('diagnostik')->nullable();
            $table->integer('sostoyanies_id')->unsigned();
            $table->integer('materials_tehnik_id')->unsigned()->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('categories_teh_id')
                    ->references('id')
                    ->on('categories_tehs')
                    ->onDelete('cascade');
            $table->foreign('master_id')
                    ->references('id')
                    ->on('masters')
                    ->onDelete('cascade');
            $table->foreign('sostoyanies_id')
                    ->references('id')
                    ->on('sostoyanies')
                    ->onDelete('cascade');
            $table->foreign('materials_tehnik_id')
                    ->references('id')
                    ->on('materials_tehniks')
                    ->onDelete('cascade');
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('cascade');
            
        });
        
        Schema::create('kartridjes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('models_kartridjes_id')->unsigned()->nullable();
            $table->string('serial_number', 32)->nullable();
            $table->string('complaint', 128)->nullable();
            $table->integer('master_id')->unsigned()->nullable();
            $table->longText('diagnostik')->nullable();
            $table->integer('sostoyanies_id')->unsigned();
            $table->integer('materials_kartridjes_id')->unsigned()->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('models_kartridjes_id')
                    ->references('id')
                    ->on('models_kartridjes')
                    ->onDelete('cascade');
            $table->foreign('master_id')
                    ->references('id')
                    ->on('masters')
                    ->onDelete('cascade');
            $table->foreign('sostoyanies_id')
                    ->references('id')
                    ->on('sostoyanies')
                    ->onDelete('cascade');
            $table->foreign('materials_kartridjes_id')
                    ->references('id')
                    ->on('materials_kartridjes')
                    ->onDelete('cascade');
            $table->foreign('client_id')
                    ->references('id')
                    ->on('clients')
                    ->onDelete('cascade');
            
        });
        Schema::create('acts_kartridjes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('kartridjes_id')->unsigned()->nullable();
            $table->string('files', 128)->nullable();
            $table->timestamps();
            $table->foreign('kartridjes_id')
                    ->references('id')
                    ->on('kartridjes')
                    ->onDelete('cascade');
        });
        Schema::create('acts_tehnikas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('tehnikas_id')->unsigned()->nullable();
            $table->string('files', 128)->nullable();
            $table->timestamps();
            $table->foreign('tehnikas_id')
                    ->references('id')
                    ->on('tehnikas')
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
        Schema::dropIfExists('kartridjes');
        Schema::dropIfExists('models_kartridjes');
        Schema::dropIfExists('sostoyanies');
        Schema::dropIfExists('materials_kartridjes');
        Schema::dropIfExists('masters');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('tehnikas');
        Schema::dropIfExists('materials_tehniks');
        Schema::dropIfExists('categories_teh');
        Schema::dropIfExists('acts_tehnikas');
        Schema::dropIfExists('acts_kartridjes');
    }
}

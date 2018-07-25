<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('transaction_types', function(Blueprint $table){
            $table->increments('id');
            $table->string('name')->comment('1:Venta, 2:Alquiler, 3:Suscripción');
            $table->string('description')->comment('1:Venta, 2:Alquiler, 3:Suscripción');
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type');
            $table->foreign('type')->references('id')->on('transaction_types');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');
            $table->timestamp('initial_date')->nullable();
            $table->timestamp('final_date')->nullable();
            $table->integer('amount');
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
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transaction_types');
    }
}

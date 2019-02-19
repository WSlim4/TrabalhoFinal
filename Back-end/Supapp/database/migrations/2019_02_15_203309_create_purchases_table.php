<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price_paid');
            $table->integer('amount_purchased');
            $table->integer('customer_id')->unsigned();
            $table->integer('merchandise_id')->unsigned();
            $table->timestamps();            
        });
        Schema::table('purchases', function (Blueprint $table){
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
        Schema::table('purchases', function (Blueprint $table){
            $table->foreign('merchandise_id')->references('id')->on('merchandises')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}

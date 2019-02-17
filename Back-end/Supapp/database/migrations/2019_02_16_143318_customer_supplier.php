<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_supplier', function (Blueprint $table) {
            $table->increments('id');
            $table->float('rating');
            $table->integer('customer_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            $table->timestamps();            
        });
        Schema::table('customer_supplier', function (Blueprint $table){
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
        Schema::table('customer_supplier', function (Blueprint $table){
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('customer_supplier');
    }
}

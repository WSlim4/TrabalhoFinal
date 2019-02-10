<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('cnpj_supplier')->unique();
            $table->string('adress_supplier');
            $table->string('phone_supplier');
            $table->string('id_pic_supplier')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });

        Schema::table('suppliers', function(Blueprint $table){

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         });

        Schema::table('suppliers', function($table)
        {
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}

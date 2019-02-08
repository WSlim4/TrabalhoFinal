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
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->string('name_supplier');
            $table->string('cnpj_supplier')->unique();
            $table->string('adress_supplier');
            $table->string('email_supplier');
            $table->string('phone_supplier');
            $table->string('id_pic_supplier')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });
        Schema::table('suppliers'), function(Blueprint $table)
        {
          $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
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

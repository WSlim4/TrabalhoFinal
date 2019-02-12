<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('category');
            $table->string('stock');
            $table->integer('price');
            $table->string('measure_of_one_quantity');
            $table->timestamps();
        });

        Schema::table('merchandises', function(Blueprint $table)
        {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
        Schema::table('merchandises', function($table)
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
        Schema::dropIfExists('merchandises');
    }
}

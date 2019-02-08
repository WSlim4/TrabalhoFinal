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
            $table->integer('mer_id')->unsigned()->nullable();
            $table->string('name_mer');
            $table->string('category');
            $table->string('stock');
            $table->timestamps();
        });

        Schema::table('merchandises', function(Blueprint $table)
        {
          $table->foreign('mer_id')->references('id')->on('suppliers')->onDelete('cascade');
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

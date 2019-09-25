<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_travels', function (Blueprint $table) {
          $table->increments('id');
          $table->string('top_travel_mt', 11);
          $table->string('top_travel_code', 10);
          $table->integer('order');
          $table->timestamps();

          $table->foreign('top_travel_code')->references('code')->on('departments')->onDelete('cascade');
          $table->foreign('top_travel_mt')->references('mt')->on('travels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_travels');
    }
}

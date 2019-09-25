<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_travel', function (Blueprint $table) {
          $table->increments('id');
          $table->string('country_code_iata', 10);
          $table->string('travel_mt', 11);
          $table->timestamps();

          $table->foreign('country_code_iata')->references('code_iata')->on('countries')->onDelete('cascade');
          $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_travel');
    }
}

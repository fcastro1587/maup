<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_travel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('travel_mt', 11);
            $table->string('airline_code_iata', 10);
            $table->timestamps();

            $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            $table->foreign('airline_code_iata')->references('code_iata')->on('airlines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_travel');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
          $table->increments('id');
          $table->string('country_code_iata', 10);
          $table->string('name', 100)->index();
          $table->string('longitude');
          $table->string('latitude');
          $table->timestamps();

          $table->foreign('country_code_iata')->references('code_iata')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}

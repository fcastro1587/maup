<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_travel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('travel_mt', 11);
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('section_travel');
    }
}

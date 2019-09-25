<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_travels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('carousel_travel_mt', 11);
            $table->string('carousel_travel_code', 10);
            $table->integer('order');
            $table->integer('multimedia_id')->unsigned();
            $table->timestamps();

            $table->foreign('carousel_travel_code')->references('code')->on('departments')->onDelete('cascade');
            $table->foreign('carousel_travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            /*$table->foreign('multimedia_id')->references('id')->on('multimedia')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_travels');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTravelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multimedia_travel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('travel_mt', 11);
            $table->string('multimedia_name', 100);
            $table->timestamps();

            $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            $table->foreign('multimedia_name')->references('name')->on('multimedia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multimedia_travel');
    }
}

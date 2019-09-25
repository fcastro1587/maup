<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_carousels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('travel_mt', 11);
            $table->integer('bloqueo_mt');
            $table->integer('multimedia_id_1')->unsigned();
            $table->integer('multimedia_id_2')->unsigned();
            $table->integer('multimedia_id_3')->unsigned();
            $table->timestamps();

            $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            /*$table->foreign('multimedia_id_1')->references('id')->on('multimedia')->onDelete('cascade');
            $table->foreign('multimedia_id_2')->references('id')->on('multimedia')->onDelete('cascade');
            $table->foreign('multimedia_id_3')->references('id')->on('multimedia')->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_carousels');
    }
}

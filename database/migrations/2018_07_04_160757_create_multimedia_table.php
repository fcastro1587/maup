<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultimediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('multimedia', function (Blueprint $table) {
             $table->string('name', 100);
             $table->string('title', 100);
             $table->string('country', 10)->nullable();
             $table->integer('city')->unsigned();
             $table->string('description');
             $table->string('size');
             $table->integer('type')->nullable();
             $table->string('url');
             $table->integer('video_type');
             $table->timestamps();

             $table->primary('name');

             $table->foreign('city')->references('id')->on('cities');
             $table->foreign('country')->references('code_iata')->on('countries');
         });


     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('multimedia');
    }
}

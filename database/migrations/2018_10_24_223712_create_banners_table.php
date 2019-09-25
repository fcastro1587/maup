<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('img1')->unsigned();
            $table->integer('img2')->unsigned();
            $table->string('banner_department', 10);
            $table->string('banner_mt', 11)->nullable();
            $table->string('days', 50)->nullable();
            $table->string('price_from', 50)->nullable();
            $table->string('alt', 200);
            $table->string('url', 255)->nullable();
            $table->float('status');
            $table->timestamps();

            /*$table->foreign('img1')->references('id')->on('multimedia')->onDelete('cascade');
            $table->foreign('img2')->references('id')->on('multimedia')->onDelete('cascade');*/
            $table->foreign('banner_department')->references('code')->on('departments')->onDelete('cascade');
            $table->foreign('banner_mt')->references('mt')->on('travels')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_mt', 11)->nullable();
            $table->string('header_department', 10);
            $table->string('img', 200);
            $table->integer('order')->nullable();
            $table->integer('active_head')->nullable();
            $table->timestamps();

            $table->foreign('header_mt')->references('mt')->on('travels')->onDelete('cascade');
            $table->foreign('header_department')->references('code')->on('departments')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('headers');
    }
}

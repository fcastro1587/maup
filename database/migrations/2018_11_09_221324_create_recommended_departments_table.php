<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommendedDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommended_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code_department', 10);
            $table->string('travel_mt', 11);
            $table->integer('bloqueo_mt');
            $table->integer('multimedia_id_1')->unsigned();
            $table->timestamps();

            $table->foreign('code_department')->references('code')->on('departments')->onDelete('cascade');
            $table->foreign('travel_mt')->references('mt')->on('travels')->onDelete('cascade');
            /*$table->foreign('multimedia_id_1')->references('id')->on('multimedia')->onDelete('cascade');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recommended_departments');
    }
}

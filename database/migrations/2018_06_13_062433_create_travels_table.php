  <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
          $table->increments('id');
          $table->string('mt',11)->unique();
          $table->string('name', 128);
          $table->string('slug');
          $table->string('department', 10);
          $table->tinyInteger('days');
          $table->tinyInteger('nights');
          $table->float('price_from');
          $table->integer('taxes');
          $table->date('validity');
          $table->text('departure_date');
          $table->text('include');
          $table->text('not_include');
          $table->text('itinerary');
          $table->string('currency', 10);
          $table->integer('rooms_id')->unsigned();
          $table->text('price_table');
          $table->text('hotels_table')->nullable();
          $table->string('operator', 20);
          $table->float('circuit')->nullable();
          $table->integer('status');

          $table->timestamps();

          $table->foreign('department')->references('code')->on('departments')->onDelete('cascade');
          $table->foreign('currency')->references('currency_travels')->on('currencies')->onDelete('cascade');
          $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('cascade');
          $table->foreign('operator')->references('code')->on('operators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travs');
    }
}

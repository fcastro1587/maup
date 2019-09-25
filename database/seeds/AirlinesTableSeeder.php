<?php

use Illuminate\Database\Seeder;

class AirlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Airline::create([
          'code_iata'     => 'IB',
          'airline'       => 'Iberia',
          'img_airline'   => 'iberia.png'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\City::create([
          'name'              => 'Madrid',
          'country_code_iata' => '1',
          'longitude'         => '1.4521547',
          'latitude'          => '-1.25478'
        ]);
    }
}

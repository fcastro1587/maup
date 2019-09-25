<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Country::create([
          'code_iata'             => '1',
          'name_country'          => 'ESTADOS UNIDOS'
        ]);
    }
}

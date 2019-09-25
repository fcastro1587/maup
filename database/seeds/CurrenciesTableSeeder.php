<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Currency::create([
        'currency_travels'     => 'MXN',
        'description'          => 'Pesos mexicanos'
      ]);
      App\Currency::create([
        'currency_travels'     => 'EUR',
        'description'          => 'Euros'
      ]);
      App\Currency::create([
        'currency_travels'     => 'USD',
        'description'          => 'Dolares Americanos'
      ]);
    }
}

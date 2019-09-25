<?php

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Season::create([
        'code_season'       => 'VER',
        'name'              => 'Verano'
      ]);
      App\Season::create([
        'code_season'       => 'OTO',
        'name'              => 'Otoño'
      ]);
      App\Season::create([
        'code_season'       => 'INV',
        'name'              => 'Invierno'
      ]);
      App\Season::create([
        'code_season'       => 'SEM',
        'name'              => 'Semana santa'
      ]);
      App\Season::create([
        'code_season'       => 'QUI',
        'name'              => 'Quinceañeras'
      ]);
      App\Season::create([
        'code_season'       => 'LUN',
        'name'              => 'Luna de Miel'
      ]);
      App\Season::create([
        'code_season'       => 'PRO',
        'name'              => 'Viajes en ofertas y promociones vigentes'
      ]);
      App\Season::create([
        'code_season'       => 'EDEPORTIVOS',
        'name'              => 'Mega en vivo'
      ]);
    }
}

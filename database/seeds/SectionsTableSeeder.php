<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Section::create([
          'departament_code'  => 'EUR',
          'name'              => 'semana santa',
          'img_name'          => 'USA'
        ]);
    }
}

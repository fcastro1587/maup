<?php

use Illuminate\Database\Seeder;

class MultimediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
       App\Multimedia::create([
         'name'           => 'dubai.jpg',
         'title'          => 'ejemplo',
         'country'        => 'ESTADOS UNIDOS',
         'city'           => 'Madrid',
         'description'    => 'Ciudad',
         'size'           => '900x650',
         'type'           => '1',
         'url'            => 'mediotiempo.com',
         'video_type'     => '1'
       ]);
     }
}

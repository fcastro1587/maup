<?php

use Illuminate\Database\Seeder;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         App\Travel::create([
           'mt'             => '10000',
           'name'           => 'Canada Especial',
           'slug'           => 'canada-especial',
           'department'     => 'EUR',
           'days'           => '9',
           'nights'         => '7',
           'price_from'     => '4444',
           'taxes'          => '1546',
           'validity'       => '2017-02-12',
           'departure_date' => 'diarias',
           'include'        => 'test',
           'not_include'    => 'test',
           'itinerary'      => 'test',
           'currency'       => 'MXN',
           'rooms_id'       => '1',
           'price_table'    => 'test',
           'hotels_table'   => 'test',
           'operator'       => 'EVP',
           'circuit'        => '1',
           'status'         => '1'
         ]);

     }
}

<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         App\Department::create([
           'code'              => 'EUR',
           'name'              => 'EUROPA',
           'initial_range'     => '10000',
           'final_range'       => '19999'
         ]);
     }
}

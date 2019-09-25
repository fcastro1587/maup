<?php

use Illuminate\Database\Seeder;

class OperatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Operator::create([
        'code'             => 'EVP',
        'code_department'  => 'europa',
        'name'             => 'VPT'
      ]);
    }
}

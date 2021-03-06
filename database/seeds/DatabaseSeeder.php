<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
      $this->call(DepartmentsTableSeeder::class);
      $this->call(AirlinesTableSeeder::class);
      $this->call(CurrenciesTableSeeder::class);
      $this->call(RoomsTableSeeder::class);
      $this->call(ToursTableSeeder::class);
      $this->call(CountriesTableSeeder::class);
      $this->call(CitiesTableSeeder::class);
      $this->call(MultimediaTableSeeder::class);
      $this->call(SectionsTableSeeder::class);
      $this->call(SeasonsTableSeeder::class);
      $this->call(OperatorsTableSeeder::class);
      $this->call(TravelsTableSeeder::class);
    }
}

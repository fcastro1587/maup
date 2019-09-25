<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //factory(App\User::class, 29)->create();

       App\User::create([
           'name'     => 'Fernando Castro',
           'email'    => 'fcastro1587@gmail.com',
           'password' => bcrypt('123')
       	]);
      App\User::create([
          'name'     => 'Luis Garcia',
          'email'    => 'luis.glf@meca.mx',
          'password' =>  bcrypt('123456')
       ]);
    }
}

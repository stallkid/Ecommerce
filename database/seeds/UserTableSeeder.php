
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use codecommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

  public function run()
  {
    DB::table('users')->truncate();

    $faker = Faker::create();

    User::create([
      'name' => 'renan',
      'email' => 'renan@hotmail.com',
      'password' => Hash::make(1234),
    ]);

    foreach (range(1,10) as $i) {

      User::create([
        'name' => $faker->name(),
         'email' => $faker->email(),
         'password' => Hash::make($faker->word)
      ]);

    }

  }

}

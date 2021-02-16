<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
 {
     for ($i=0; $i < 19 ; $i++) {

           $new_user = new User();
           $new_user->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
           $new_user->email = $faker->unique()->email();
           $new_user->password = $faker->password();
           $new_user->address = $faker->unique()->address();
           $new_user->VAT_number = $faker->unique()->randomNumber($nbDigits = 11);
           $new_user->save();
        }
   }
}

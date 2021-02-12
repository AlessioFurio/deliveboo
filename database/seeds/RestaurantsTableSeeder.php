<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 40 ; $i++) {

            $new_restaurant = new Restaurant();
            $new_restaurant->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $new_restaurant->address = $faker->address();
            $new_restaurant->phone = $faker->phoneNumber();
            $new_restaurant->save();
        }
    }
}

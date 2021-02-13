<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run(Faker $faker)
        {
          for ($i=0; $i < 400 ; $i++) {

                $new_dish = new Dish();
                $new_dish->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
                $new_dish->ingredients = $faker->text($maxNbChars = 120);
                $new_dish->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99);
                $new_dish->visibility = $faker->boolean($chanceOfGettingTrue = 50);
                $new_dish->restaurant_id = $faker->numberBetween($min = 1, $max = 40);
                $new_dish->course_id = 1;
                $new_dish->save();
        }
    }
}

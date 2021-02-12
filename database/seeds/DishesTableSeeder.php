<?php

use Illuminate\Database\Seeder;

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
            $new_dish->price = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL);
            $new_dish->visibility = $faker->boolean($chanceOfGettingTrue = 50);
            $new_dish->save();
    }
}

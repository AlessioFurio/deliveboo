<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 10 ; $i++) {

            $new_restaurant = new Restaurant();
            $new_restaurant->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $new_restaurant->address = $faker->address();
            $new_restaurant->phone = $faker->phoneNumber();
            $new_restaurant->user_id = $faker->numberBetween($min = 1, $max = 5);

            $slug = Str::slug($new_restaurant->name);
            $current_restaurant = Restaurant::where('slug', $slug)->first();
            $slug_base = $slug;
            $counter = 1;
            while ($current_restaurant) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $current_restaurant = Restaurant::where('slug', $slug)->first();
            }
            $new_restaurant->slug = $slug;

            $new_restaurant->save();
        }
    }
}

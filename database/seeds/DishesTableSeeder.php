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

        $plates = ['Sushi','Pizza','Hamburger','fritto di','Dolce del','El taco','Thai do','Pasta alla', 'Arinoba' , 'Grigliata' ];
        $images = ['sushi','pizzeria','fast-food','rosticceria','pasticceria','messicano','cinese','italiano','orientale','trattoria'];
        for ($i=0; $i < 10 ; $i++) {

            for ($j=0; $j < 10 ; $j++) {
                $new_dish = new Dish();
                $new_dish->name = $plates[$i].''.$faker->word();
                $new_dish->ingredients = $faker->text($maxNbChars = 60);
                $new_dish->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 8, $max = 45);
                $new_dish->visibility = $faker->boolean($chanceOfGettingTrue = 50);
                $new_dish->restaurant_id = $i+1;
                $new_dish->cover = 'cover_dish/'.$images[$i].' ('.$j.').jpg';
                $new_dish->course_id = $faker->numberBetween($min = 1, $max = 5);
                $new_dish->save();
            }

        }
    }
}

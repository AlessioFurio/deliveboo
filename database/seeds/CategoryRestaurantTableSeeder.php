<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Restaurant;

class CategoryRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=1; $i < 11 ; $i++) {
            if ($i < 9) {
                DB::table('category_restaurant')->insert([
                    'category_id' => $i,
                    'restaurant_id' => $i
                ]);
            } else {
                DB::table('category_restaurant')->insert([
                    'category_id' => $i-2,
                    'restaurant_id' => $i
                ]);
                DB::table('category_restaurant')->insert([
                    'category_id' => $i-8,
                    'restaurant_id' => $i
                ]);
            }
        }
    }
}

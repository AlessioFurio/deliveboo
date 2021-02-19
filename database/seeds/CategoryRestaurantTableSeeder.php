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
            if ($i < 6) {
                for ($j=0; $j < 3 ; $j++) {
                    DB::table('category_restaurant')->insert([
                        'category_id' => $j+$i,
                        'restaurant_id' => $i
                    ]);
                }
            } else {
                for ($j=0; $j < 3 ; $j++) {
                    DB::table('category_restaurant')->insert([
                        'category_id' => $i-$j-3,
                        'restaurant_id' => $i
                    ]);
                }
            }
        }
    }
}

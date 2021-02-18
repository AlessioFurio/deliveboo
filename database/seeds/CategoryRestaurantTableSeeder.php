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
        for ($i=0; $i < 20 ; $i++) {
            // code...
            DB::table('category_restaurant')->insert([
                'category_id' => Category::select('id')->orderByRaw("RAND()")->first()->id,
                'restaurant_id' => Restaurant::select('id')->orderByRaw("RAND()")->first()->id,
            ]);
        }
    }
}

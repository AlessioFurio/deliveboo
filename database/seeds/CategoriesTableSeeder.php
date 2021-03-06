<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $our_categories = ['Sushi','Pizzeria','Fast-food','Rosticceria','Pasticceria','Messicano','Cinese','Italiano'];

        for ($i=0; $i < 8 ; $i++) {

            $new_category = new Category();
            $new_category->name = $our_categories[$i];

            $slug = Str::slug($new_category->name);
            $current_category = Category::where('slug', $slug)->first();
            $slug_base = $slug;
            $counter = 1;
            while ($current_category) {
                $slug = $slug_base . '-' . $counter;
                $counter++;
                $current_category = Category::where('slug', $slug)->first();
            }
            $new_category->slug = $slug;
            $new_category->save();

        }
    }
}

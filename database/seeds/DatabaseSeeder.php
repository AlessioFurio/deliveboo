<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            BuyersTableSeeder::class,
            CategoriesTableSeeder::class,
            CoursesTableSeeder::class,
            Payment_methodsTableSeeder::class,
            RestaurantsTableSeeder::class,
            DishesTableSeeder::class,
            PaymentsTableSeeder::class
        ]);
    }
}

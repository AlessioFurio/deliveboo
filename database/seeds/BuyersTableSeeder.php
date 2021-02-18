<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Buyer;

class BuyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
        {
             for ($i=0; $i < 20 ; $i++) {

                 $new_buyer = new Buyer();
                 $new_buyer->nome = $faker->firstName();
                 $new_buyer->cognome = $faker->lastName();
                 $new_buyer->indirizzo = $faker->address();
                 $new_buyer->save();
               }
        }
}

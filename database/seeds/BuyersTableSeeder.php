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
             for ($i=0; $i < 19 ; $i++) {

                   $new_buyer = new Buyer();
                   $new_buyer->nome = $faker->word();
                   $new_buyer->cognome = $faker->word();
                   $new_buyer->indirizzo = $faker->address();
                   $new_buyer->save();
         }
    }
}

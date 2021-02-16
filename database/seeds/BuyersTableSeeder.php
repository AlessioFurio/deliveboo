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

               $new_payment = new Buyer();
               $new_payment->nome = $faker->word();
               $new_payment->cognome = $faker->word();
               $new_payment->indirizzo = $faker->address();
               $new_payment->save();
     }
}

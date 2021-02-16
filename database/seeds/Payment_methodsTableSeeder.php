<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Payment_method;

class Payment_methodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < 1 ; $i++) {

               $new_payment_method = new Payment_method();
               $new_payment_method->name = $faker->word();
               $new_payment_method->save();
     }
}

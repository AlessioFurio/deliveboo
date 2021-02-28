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

        $methods = ['Carta' , 'PayPal'];
         for ($i=0; $i < 2 ; $i++) {

               $new_payment_method = new Payment_method();
               $new_payment_method->name = $methods[$i];
               $new_payment_method->save();
           }
    }
}

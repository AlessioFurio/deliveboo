<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
        {
            for ($i=0; $i < 20 ; $i++) {

                 $new_payment = new Payment();
                 $new_payment->buyer_id = $faker->numberBetween($min = 1, $max = 20);
                 $new_payment->user_id = $faker->numberBetween($min = 1, $max = 20);
                 $new_payment->payment_method_id = numberBetween($min = 1, $max = 2);
                 $new_payment->price = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 99);
                 $new_payment->status = $faker->word();
                 $new_payment->save();
        }
    }
}

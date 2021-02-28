<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use illuminate\Support\Str;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      $names = ['Sushi da Kyo','Pizzeria Il Vecchio Forno', 'Boolger King', 'Gastronomia Da Armando', 'Boolcis in fundo' ,'ElDorado tex-mex', 'Chi-Bool-Sun' , 'Trattoria il Sole', 'Oriental Express','Laurent Restaurant'];
      $addresses = ['Via Del Rinascimento 5 ','Piazza Garibaldi 12', 'Corso Vittorio Veneto 34', 'Via Roma 225', 'Largo Principe Umberto 71', 'Via Della rivoluzione 69', 'Piazza della Repubblica 25' , 'Via I Maggio 89', 'Lungomare XX Settembre 77', 'Piazzetta degli Sviluppatori 18' ];
      for ($i=0; $i < 10 ; $i++) {

          $new_restaurant = new Restaurant();
          $new_restaurant->name = $names[$i];
          $new_restaurant->address = $addresses[$i];
          $new_restaurant->phone = '06 '.($faker->randomNumber($nbDigits = 7));
          if ($i < 5) {
              $new_restaurant->user_id = $i + 1;
          } else {
              $new_restaurant->user_id = $i - 4;
          }
          $new_restaurant->cover = 'cover_shop/restaurant ('.$i.').jpg';

          $slug = Str::slug($new_restaurant->name);
          $current_restaurant = Restaurant::where('slug', $slug)->first();
          $slug_base = $slug;
          $counter = 1;
          while ($current_restaurant) {
              $slug = $slug_base . '-' . $counter;
              $counter++;
              $current_restaurant = Restaurant::where('slug', $slug)->first();
          }
          $new_restaurant->slug = $slug;

          $new_restaurant->save();
      }

    }
}

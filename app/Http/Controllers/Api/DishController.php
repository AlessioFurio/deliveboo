<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    public function index () {

        $dish_id = $_GET['query']; //recupero il parametro query (id di category)

      if($dish_id) { //se la categoria e' selezionata
        $dishes = Dish::whereHas('dishes', function (Builder $query) use ($dish_id)  {
          $query->where('id', '=', $dish_id);
        })->get(); //cerco quei ristoranti che hanno una categoria con id specifica
      } else {
        $dishes = Dish::limit(10)->get();
      }

         // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $dishes
        ]);
    }
}

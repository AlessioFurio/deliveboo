<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Database\Eloquent\Builder;

class RestaurantController extends Controller

//filtro per selezione categoria
{
    public function index () {
      $category_id = $_GET['query']; //recupero il parametro query (id di category)

      if($category_id) { //se la categoria e' selezionata
        $restaurants = Restaurant::whereHas('categories', function (Builder $query) use ($category_id)  {
          $query->where('id', '=', $category_id);
        })->get(); //cerco quei ristoranti che hanno una categoria con id specifica
      } else {
        $restaurants = Restaurant::limit(10)->get();
      }

         // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }
}

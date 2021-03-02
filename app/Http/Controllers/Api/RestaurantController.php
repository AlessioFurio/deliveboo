<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Course;
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
        $restaurants = Restaurant::limit(8)->get();
      }

         // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }

    //     public function show($slug)
    //     {
    //       $restaurant = Restaurant::where('slug', $slug)->first();
    //       if(!$restaurant) {
    //           abort(404);
    //       }
    //
    //       $courses_id = [];
    //
    //       foreach ($restaurant->dishes as $dish) {
    //         if (!in_array($dish->course_id, $courses_id)) {
    //           $courses_id[] = $dish->course_id;
    //         }
    //       }
    //
    //       $courses = Course::whereIn('id', $courses_id)->get();
    //
    //       $data = [
    //         'restaurant' => $restaurant,
    //         'courses' => $courses,
    //         'dishes' => $restaurant->dishes
    //       ];
    //       return response()->json([ // restituisce un json con i vari post
    //           'success' => true,
    //           'results' => $data
    //     ]);
    // }
}

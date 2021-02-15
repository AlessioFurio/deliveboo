<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Category;

class RestaurantController extends Controller
{
    public function index () {
        $restaurants = Restaurant::all(); // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function searchCategory ($category) {
        // dd($_GET);
        $category = Category::find(1);

        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }
}

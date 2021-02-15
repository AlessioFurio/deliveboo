<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index () {
        $restaurants = Restaurant::all(); // prendo tutti i post
        return response()->json([ // restituisce un json con i vari post
            'success' => true,
            'results' => $restaurants
        ]);
    }
}

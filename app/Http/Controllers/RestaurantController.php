<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
  public function show($slug)
  {
    $restaurant = Restaurant::where('slug', $slug)->first();
      if(!$restaurant) {
          abort(404);
      }
      $data = ['restaurant' => $restaurant];
      return view('guest.restaurants.show', $data);
  }
}

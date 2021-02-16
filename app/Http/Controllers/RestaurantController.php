<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Course;

class RestaurantController extends Controller
{
  public function show($slug)
  {
    $restaurant = Restaurant::where('slug', $slug)->first();
    if(!$restaurant) {
        abort(404);
    }

    $courses = Course::all();

    $data = [
      'restaurant' => $restaurant,
      'courses' => $courses
    ];
    return view('guest.restaurants.show', $data);
  }
}

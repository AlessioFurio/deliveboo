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

    $courses_id = [];

    foreach ($restaurant->dishes as $dish) {
      if (!in_array($dish->course_id)) {
        $courses_id[] = $dish->course_id;
      }
    }

    $courses = Course::whereIn('id', $courses_id)->get();

    $data = [
      'restaurant' => $restaurant,
      'courses' => $courses
    ];
    return view('guest.restaurants.show', $data);
  }
}

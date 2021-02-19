<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Restaurant;

class HomeController extends Controller
{

  public function index()
  {
    $categories = Category::all();
    $restaurants = Restaurant::all();
    $data = [
      'categories' => $categories,
      'restaurants' => $restaurants
    ];
      return view('guest.welcome', $data);
  }
}

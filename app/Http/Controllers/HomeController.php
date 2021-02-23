<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Restaurant;


class HomeController extends Controller
{

  public function index(Request $request)
  {
    $categories = Category::all();
    $restaurants = Restaurant::all();

    $transaction_result = $request->session()->get('transaction_result');

    $data = [
      'categories' => $categories,
      'restaurants' => $restaurants,
      'transaction_result' => $transaction_result
    ];

    return view('guest.welcome', $data);
  }
}

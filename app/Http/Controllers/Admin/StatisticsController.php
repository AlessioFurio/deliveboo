<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Restaurant;

class StatisticsController extends Controller
{
  public function show($id) {
    $user_id = Auth::user()->id;
    $own_id = [];
    $myrestaurants = Restaurant::where('user_id', $user_id)->get();
    foreach ($myrestaurants as $myrestaurant) {
        if (!in_array($myrestaurant->id, $own_id )) {
            $own_id[] = $myrestaurant->id;
        }
    }
    if (!in_array($id, $own_id)) {
        abort(404);
    }

    $data = [
        'restaurants' =>Payment::where('restaurant_id' , $id )->get()
    ];
    return view('admin.statistics.show', $data);
  }
}

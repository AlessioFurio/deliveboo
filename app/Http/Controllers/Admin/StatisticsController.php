<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;

class StatisticsController extends Controller
{
  public function index() {
    $user_id = Auth::user()->id;
    $data = [
        'payments' => Payment::where('restaurant_id' , $user_id )->get()
    ];
    return view('admin.statistics.index', $data);
  }
}

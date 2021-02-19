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
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        // code...
    }
    $data = [
        'payments' => Payment::where('id' , $user_id )->get()
    ];
    return view('admin.statistics.index', $data);
  }
}

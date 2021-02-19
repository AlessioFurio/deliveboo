<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Restaurant;

class PaymentController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;
        // dd(Auth::user()->restaurants;

        // $restaurant_auth = Restaurant::where('restaurant_id'   )

        $data = [
            'payments' => Payment::where('restaurant_id' , $user_id )->get()
        ];
        return view('admin.payments.index', $data);
    }
}

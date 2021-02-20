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

        $restaurant_auth = Restaurant::where('user_id', $user_id )->get();
        // dd($restaurant_auth);

        $data = [
            'restaurant_auth' => $restaurant_auth,
            'payments' => Payment::where('restaurant_id' , $user_id )->get()
        ];
        return view('admin.payments.index', $data);
    }
    public function show($id) {
        $order = Payment::where('id' , $id )->first();
        $data = [
            'order' => $order,
            'id' => $id
        ];
        return view('admin.orders.show', $data);

    }
    public function details($id) {
        $myrestaurant = Restaurant::where('id', $id)->first();
        $payments = Payment::where('restaurant_id' , $id)->where('status' , 2);
        $data = [
            'myrestaurant' => $myrestaurant,
            // 'id' => $id,
            // 'payments' => $payments
        ];
        return view('admin.orders.details', $data);

    }

}

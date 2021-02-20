<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Payment;
use App\Restaurant;

class OrderController extends Controller
{
    public function index() {
        $user_id = Auth::user()->id;

        $data = [
            'restaurants' =>Restaurant::where('user_id' , $user_id )->get()
        ];
        return view('admin.orders.index', $data);
    }
}

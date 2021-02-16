<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Payment;

class OrderController extends Controller
{
    public function index() {
        $data = [
            'payments' => Payment::all()
        ];
        return view('admin.orders.index', $data);
    }
}

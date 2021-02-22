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

        $data = [
            'restaurants' =>Restaurant::where('user_id' , $user_id )->get()
        ];
        return view('admin.orders.index', $data);
    }
    public function show($id) {
        $own_id = [];
        $user_id = Auth::user()->id;
        $myrestaurants = Restaurant::where('user_id', $user_id)->get();
        foreach ($myrestaurants as $myrestaurant) {
            if (!in_array($myrestaurant->id, $own_id )) {
                $own_id[] = $myrestaurant->id;
            }
        }
        if (!in_array($id, $own_id)) {
            abort(404);
        }
        $order = Payment::where('id' , $id )->first();
        $data = [
            'order' => $order,
            'id' => $id
        ];
        return view('admin.orders.show', $data);

    }
    public function details($id) {
        $own_id = [];
        $user_id = Auth::user()->id;
        $myrestaurants = Restaurant::where('user_id', $user_id)->get();
        foreach ($myrestaurants as $myrestaurant) {
            if (!in_array($myrestaurant->id, $own_id )) {
                $own_id[] = $myrestaurant->id;
            }
        }
        if (!in_array($id, $own_id)) {
            abort(404);
        }

        $restaurant = Restaurant::where('id', $id)->first();


        $payments = Payment::where('restaurant_id' , $id)->where('status' , 2);
        $data = [
            'myrestaurant' => $restaurant,
            // 'id' => $id,
            // 'payments' => $payments
        ];
        return view('admin.orders.details', $data);

    }

    public function chart($id)
    {
        $own_id = [];
        $user_id = Auth::user()->id;
        $myrestaurants = Restaurant::where('user_id', $user_id)->get();
        foreach ($myrestaurants as $myrestaurant) {
            if (!in_array($myrestaurant->id, $own_id )) {
                $own_id[] = $myrestaurant->id;
            }
        }
        if (!in_array($id, $own_id)) {
            abort(404);
        }

        $payments = Payment::where('restaurant_id' , $id)->get();


        $data = [];
        foreach($payments as $row) {
            $data['label'][] = $row->created_at;
            $data['data'][] = (int) $row->price;
        }

      $data['chart_data'] = json_encode($data);
      return view('admin.statistics.chart', $data);


    }

}

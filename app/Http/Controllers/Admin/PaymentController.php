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
        $order = Payment::where('id' , $id )->first();
        if (!in_array($order->restaurant_id, $own_id)) {
            abort(404);
        }
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


        $payments = Payment::where('restaurant_id' , $id)->get();
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
        $months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];
        $data = [
            'id' => $id,
            'months' => $months
        ];
        foreach($payments as $row) {
            $data['label'][] = $row->created_at->isoFormat('d MMMM');
            $data['data'][] = (int) $row->price;
        }

      $data['chart_data'] = json_encode($data);
      return view('admin.statistics.chart', $data);


    }

    public function month($id , $month)
    {
        $own_id = [];
        $user_id = Auth::user()->id;
        $myrestaurants = Restaurant::where('user_id', $user_id)->get();
        foreach ($myrestaurants as $myrestaurant) {
            if (!in_array($myrestaurant->id, $own_id )) {
                $own_id[] = $myrestaurant->id;
            }
        }
        if (!in_array($id, $own_id )|| !is_numeric($month) || $month <= 0 || $month > 12) {
            abort(404);
        }

        $payments = Payment::where('restaurant_id' , $id)
        ->whereMonth('created_at', $month)
        ->get();
        $sum = Payment::where('restaurant_id' , $id)->whereMonth('created_at', $month)->sum('price');
        $months = ['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];

        $data = [
            'sum' => $sum,
            'months' => $months,
            'id' => $id
        ];
        // $data['label'][] = '';
        // $data['data'][] =  0;

        foreach($payments as $row) {
            $data['label'][] = $row->created_at->isoFormat('d MMMM');
            $data['data'][] =  $row->price;
        }

        $data['chart_data'] = json_encode($data);
        return view('admin.statistics.month', $data);

    }

}

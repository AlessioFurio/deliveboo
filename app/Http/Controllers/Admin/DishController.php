<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\Course;
use App\Restaurant;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $restaurants = Restaurant::where('user_id' , $user_id )->get();
        // dd($restaurants);
        $data = [
            'restaurants' => $restaurants
        ];
      return view('admin.dishes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'dishes' => Dish::all(),
            'courses' => Course::all(),
        ];
        return view('admin.dishes.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'price' => 'required',
            'visibility' => 'required',
            'course_id' => 'required'
        ]);

        $form_data = $request->all();
        $new_dish = new Dish();
        $new_dish->fill($form_data);
        $new_dish->restaurant_id = Auth::user()->id;
        $new_dish->save();

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        $user_id = Auth::user()->id;

        if(!$dish || $dish->restaurant->user_id != $user_id ) {
            abort(404);
        }
        $data = [
            'dish' => $dish
        ];
        return view('admin.dishes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {

        $user_id = Auth::user()->id;
        if(!$dish || $dish->restaurant->user_id != $user_id) {
            abort(404);
        }
        $data = [
            'dish' => $dish,
            'courses' => Course::all()
        ];
        return view('admin.dishes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'ingredients' => 'required',
            'price' => 'required',
            'visibility' => 'required',
            'course_id' => 'required'
        ]);
        $form_data = $request->all();
        $dish->update($form_data);

        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $user_id = Auth::user()->id;
        if(!$dish || $dish->restaurant->user_id != $user_id) {
            abort(404);
        }


        $dish->delete();

        return redirect()->route('admin.dishes.index');
    }
}

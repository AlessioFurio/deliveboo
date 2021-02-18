<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        $restaurants = Restaurant::where('user_id' , $user_id )->with(['dishes' => function ($q){
        $q->orderBy('name' , 'asc');
        }])->get();
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
        $own_id = [];
        $user_id = Auth::user()->id;
        $collect = Restaurant::where('user_id' , $user_id )->get();
        foreach ($collect as $collection) {
            if (!in_array($collection->id, $own_id )) {
                $own_id[] = $collection->id;
            }
        }
        if (isset($_GET['rest']) && in_array($_GET['rest'], $own_id )) {
            $restaurants = $_GET['rest'];
        }else {
            $restaurants = $collect;
        }

        $data = [
            'restaurants' => $restaurants,
            'dishes' => Dish::all(),
            'courses' => Course::all(),
            'own_id' => $own_id
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
            'course_id' => 'required',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);
        $own_id = [];
        $user_id = Auth::user()->id;
        $collect = Restaurant::where('user_id' , $user_id )->get();
        foreach ($collect as $collection) {
            if (!in_array($collection->id, $own_id )) {
                $own_id[] = $collection->id;
            }
        }


        $form_data = $request->all();
        $new_dish = new Dish();
        if (array_key_exists('cover' , $form_data )) {
            $image_path = Storage::put('cover_dish' , $form_data['cover']);
            $form_data['cover'] = $image_path;
        }

        if (!in_array($form_data['restaurant_id'], $own_id )) {
            abort(404);
        }
        $new_dish->fill($form_data);
        $new_dish->save();



        return redirect()->route('admin.restaurants.show', ['restaurant'=> $form_data['restaurant_id']]);
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
            'course_id' => 'required',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);
        $own_id = [];
        $user_id = Auth::user()->id;
        $collect = Restaurant::where('user_id' , $user_id )->get();
        foreach ($collect as $collection) {
            if (!in_array($collection->id, $own_id )) {
                $own_id[] = $collection->id;
            }
        }

        $form_data = $request->all();
        if (array_key_exists('cover' , $form_data)) {
            $image_path = Storage::put('cover_dish' , $form_data['cover']);
            $form_data['cover'] = $image_path;
        }
        if (!in_array($dish->restaurant_id , $own_id )) {
            abort(404);
        }


        $dish->update($form_data);

        return redirect()->route('admin.restaurants.show', ['restaurant'=> $dish->restaurant_id]);
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

        return redirect()->route('admin.restaurants.show', ['restaurant'=> $dish->restaurant->id]);
    }
}

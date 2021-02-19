<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Category;
use App\Dish;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{
    public $attributes;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = [
            'category' => Category::all(),
            'restaurants' => Restaurant::where('user_id' , $user_id )->orderBy('name', 'asc')->get()
        ];
        return view('admin.restaurants.index' , $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
        ];
        return view('admin.restaurants.create', $data);
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
            'name' => 'required|max:255',
            'address' => 'required | max:255',
            'categories' => 'exists:categories,id',
            'phone' => 'required|max:255',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'
        ]);
        $input_data = $request->all();
        $add_restaurant = new Restaurant();
        if (array_key_exists('cover' , $input_data )) {
            $image_path = Storage::put('cover_shop' , $input_data['cover']);
            $input_data['cover'] = $image_path;
        }
        $add_restaurant->fill($input_data);
        $slug = Str::slug($add_restaurant->name);
        $slug_base = $slug;

        $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();
        $j = 1;
        while ($restaurant_if_exist) {
            $slug = $slug_base .'-'.$j;
            $j++;
            $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();

        }
        $add_restaurant->slug = $slug;
        $add_restaurant->user_id = Auth::user()->id;



        $add_restaurant->save();

        if(array_key_exists('categories', $input_data)) {
            $add_restaurant->categories()->sync($input_data['categories']);
        }


        return redirect()->route('admin.restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {

        $user_id = Auth::user()->id;
        if ($restaurant && $restaurant->user_id == $user_id) {
            $data = [
                'restaurant' => $restaurant
            ];
            return view('admin.restaurants.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $user_id = Auth::user()->id;

        if ($restaurant && $restaurant->user_id == $user_id) {
            $data = [
                'restaurant' => $restaurant,
                'categories' => Category::all()
            ];
            return view('admin.restaurants.edit', $data);
        }
        abort(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required | max:255',
            'categories' => 'exists:categories,id',
            'phone' => 'required|max:255',
            'cover' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:700'

        ]);

        $form_data = $request->all();
        if ($form_data['name'] != $restaurant->name) {
            $slug = Str::slug($form_data['name']);
            $slug_base = $slug;

            $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();
            $j = 1;
            while ($restaurant_if_exist) {
                $slug = $slug_base .'-'.$j;
                $j++;
                $restaurant_if_exist = Restaurant::where('slug' , $slug)->first();

            }
            $form_data['slug'] = $slug;
        }

        if (array_key_exists('cover' , $form_data)) {
            $image_path = Storage::put('cover_shop' , $form_data['cover']);
            $form_data['cover'] = $image_path;
        }

        $restaurant->update($form_data);
        if(array_key_exists('categories', $form_data)) {
            $restaurant->categories()->sync($form_data['categories']);
        }
        return redirect()->route('admin.restaurants.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $user_id = Auth::user()->id;

        if ($restaurant && $restaurant->user_id == $user_id) {


        $restaurant->categories()->sync([]);

        $restaurant->delete();
        return redirect()->route('admin.restaurants.index');
        }
        abort(404);

    }
}

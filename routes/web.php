<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//guest
Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('/restaurants', 'RestaurantController@index')->name('restaurants.index');
Route::get('/restaurants/{slug}', 'RestaurantController@show')->name('restaurants.show');
Route::get('/dishes', 'DishesController@index')->name('dishes.index');
Route::get('/dishes/{slug}', 'DishesController@show')->name('dishes.show');

Auth::routes();


Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('/categories', 'CategoryController');
  Route::resource('/restaurants', 'RestaurantController');
  Route::resource('/dishes', 'DishesController');


  
});

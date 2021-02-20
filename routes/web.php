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
// Route::get('/categories', 'CategoryController@index')->name('categories.index');
// Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('/restaurants', 'RestaurantController@index')->name('restaurants.index');
Route::get('/restaurants/{slug}', 'RestaurantController@show')->name('restaurants.show');
// Route::get('/dishes', 'DishesController@index')->name('dishes.index');
// Route::get('/dishes/{slug}', 'DishesController@show')->name('dishes.show');

Route::get('/payments', 'PaymentController@index')->name('payments.index');
Route::post('/transaction', 'PaymentController@transaction')->name('transaction');

Auth::routes();


Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function(){
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/orders', 'OrderController@index')->name('orders.index');
  Route::get('/payments', 'PaymentController@index')->name('payments.index');
  Route::get('/orders/{id}', 'PaymentController@show')->name('orders.show');
  Route::get('/details/{id}', 'PaymentController@details')->name('orders.details');
  Route::get('/statistics', 'StatisticsController@index')->name('statistics.index');
  // Route::resource('/categories', 'CategoryController');
  Route::resource('/restaurants', 'RestaurantController');
  Route::resource('/dishes', 'DishController');
});

//sto facendo branch + push

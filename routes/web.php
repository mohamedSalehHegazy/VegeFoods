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

Route::get('/','homeController@index');

Route::get('shop','shopController@index');
Route::get('shop/veg','shopController@vegShow');
Route::get('shop/fruits','shopController@fruitsShow');
Route::get('shop/juice','shopController@juiceShow');
Route::get('product/{id}','shopController@productShow');
Route::get('shop/search','shopController@search');

Route::get('order','ordersController@addToTable');
Route::get('myorders','ordersController@show');
Route::get('fakatLogin','ordersController@fakatLogin');

Route::resource('cart','cartController');


Route::get('/wishlist', function () {
    return view('pages.wishlist');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});
Auth::routes();


 Route::get('/home', 'ordersController@index');

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => '/','middleware' => ['auth:api'],],function() {
   
    // id=> for the user get all products for each user
    Route::get('/mycart/{id}', 'ApiCartController@all')->name('cart.all');
    // id=> for the categorydetails->id
    Route::get('/cart/{id}', 'ApiCartController@show')->name('cart.show');
    Route::post('/cart/{id}', 'ApiCartController@store')->name('cart.store');
});
// Route::put('/category/{id}', 'ApiCartOrderController@update')->name('category.update');
// Route::delete('/category/{id}', 'ApiCartOrderController@destroy')->name('category.destroy');




Route::get('/allorders', 'ApiOrderController@all')->name('order.all');
// id=> for the user get all products for each user
Route::get('/myorder/{id}', 'ApiOrderController@myorder')->name('order.myorder');
// id=> for the categorydetails->id
// Route::get('/order/{id}', 'ApiOrderController@show')->name('order.show');
Route::post('/order', 'ApiOrderController@store')->name('order.store');
Route::put('/order/{id}', 'ApiorderController@update')->name('order.update');
// Route::delete('/order/{id}', 'ApiorderController@destroy')->name('order.destroy');

// ownersearchorder
Route::get('/searchorder/{id}', 'ApiOrderController@searchorder')->name('order.searchorder');
// owner orderdetails
Route::get('/orderdetails/{id}', 'ApiOrderController@orderdetails')->name('order.orderdetails');

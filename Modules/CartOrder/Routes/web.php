<?php

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

// Route::prefix('cartorder')->group(function() {
//     Route::get('/', 'CartOrderController@index');
// });
Route::group(['prefix' => 'admin','middleware' => ['auth',],],function() {
    Route::resource('cart', 'CartController');
    Route::resource('order', 'OrderController');
    Route::resource('orderdetails', 'OrderDetailsController');
});

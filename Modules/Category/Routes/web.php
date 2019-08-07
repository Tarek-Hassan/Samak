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

// Route::prefix('category')->group(function() {
//     Route::get('/', 'CategoryController@index');
// });
Route::group(['prefix' => 'admin','middleware' => ['auth',],],function() {
    Route::resource('category', 'CategoryController');
    Route::resource('categorydetails', 'CategoryDetailsController');
    // Route::post('favorite', 'CategoryDetailsController@favorite');
    // Route::get('myfavorite', 'CategoryDetailsController@myFavorites')->name('myfavorite');
    // Route::resource('advrtisment', 'AdvrtismentController');
});

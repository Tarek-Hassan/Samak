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

// Route::middleware('auth:api')->get('/manageusers', function (Request $request) {
//     return $request->user();
// });
// Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/manageusers', 'ApiManageUsersController@all')->name('manageusers.all');
    Route::post('/manageusers', 'ApiManageUsersController@store')->name('manageusers.store');
    Route::get('/manageusers/{id}', 'ApiManageUsersController@show')->name('manageusers.show');
    Route::put('/manageusers/{id}', 'ApiManageUsersController@update')->name('manageusers.update');
    Route::delete('/manageusers/{id}', 'ApiManageUsersController@destroy')->name('manageusers.destroy');
    // });
    // Route::get('/manageusers', 'ApiManageUsersController@all')->name('manageusers.all');
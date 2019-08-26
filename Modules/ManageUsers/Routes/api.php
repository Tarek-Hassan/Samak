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
    Route::put('/manageusers/{id}', 'ApiManageUsersController@update')->name('manageusers.update');
});
// Route::group(['middleware' => 'auth:api'], function(){
    // Route::get('/manageusers', 'ApiManageUsersController@all')->name('manageusers.all');
    // Route::post('/manageusers', 'ApiManageUsersController@store')->name('manageusers.store');
    // Route::get('/manageusers/{id}', 'ApiManageUsersController@show')->name('manageusers.show');
    // });
    // Route::get('/userinfo', 'ApiUserController@GetUserInfo');
    // Route::post('/updateprofile', 'ApiUserController@UpdateProfile');
    // Route::post('/changepassword', 'ApiUserController@ChangePassword');
    Route::get('register/activate/{token}', 'ApiManageUsersController@signupActivate');
    Route::post('login', 'ApiManageUsersController@Login');
    Route::post('register', 'ApiManageUsersController@Register');
    // Route::delete('/manageusers/{id}', 'ApiManageUsersController@destroy')->name('manageusers.destroy');






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

// Route::middleware('auth:api')->get('/setting', function (Request $request) {
//     return $request->user();
// });
Route::get('/aboutus', 'APISettingController@aboutus')->name('aboutus.aboutus');
Route::get('/advrtisment', 'APISettingController@advrtisment')->name('advrtisment.advrtisment');
Route::get('/privacy', 'APISettingController@privacy')->name('privacy.privacy');
Route::get('/info', 'APISettingController@info')->name('info.info');

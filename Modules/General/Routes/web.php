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
// Auth::routes();
Route::group(['prefix' => '/','middleware' => ['auth',],],function() {
    Route::get('admin', 'GeneralController@index')->name('admin.dashboard');

});

// Route::group(['prefix' => 'admin','middleware' => ['auth',],],function() {
// Route::get('language/change/{lange}', function ($lang) {
//     session(['lang' => $lang]);
//     return redirect()->back();
// })->name('language.change');
// });



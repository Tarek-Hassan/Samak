<?php use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/category', function (Request $request) {
//     return $request->user();
// });
// // type
// Route::get('/type', 'ApiTypeController@all')->name('type.all');
// Route::get('/type/{id}', 'ApiTypeController@show')->name('type.show');
// //

Route::get('/category', 'ApiCategoryController@all')->name('category.all');
// Route::post('/category', 'ApiCategoryController@store')->name('category.store');
// Route::get('/category/{id}', 'ApiCategoryController@show')->name('category.show');
// Route::put('/category/{id}', 'ApiCategoryController@update')->name('category.update');
// Route::delete('/category/{id}', 'ApiCategoryController@destroy')->name('category.destroy');
//

Route::get('/categorydetails', 'ApiCategoryDetailsController@all')->name('categorydetails.all');
Route::post('/categorydetails', 'ApiCategoryDetailsController@store')->name('categorydetails.store');
Route::get('/categorydetails/{id}', 'ApiCategoryDetailsController@show')->name('categorydetails.show');
Route::put('/categorydetails/{id}', 'ApiCategoryDetailsController@update')->name('categorydetails.update');
Route::delete('/categorydetails/{id}', 'ApiCategoryDetailsController@destroy')->name('categorydetails.destroy');

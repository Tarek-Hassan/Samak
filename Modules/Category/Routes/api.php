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


    Route::group(['prefix' => '/','middleware' => ['auth:api'],],function() {
        Route::get('/categorydetails/{id}', 'ApiCategoryDetailsController@show')->name('categorydetails.show');
        Route::get('/category', 'ApiCategoryController@all')->name('category.all');
        Route::post('/rate/{id}', 'ApiCategoryDetailsController@addRate')->name('rate.addRate');
    });



// Route::post('/category', 'ApiCategoryController@store')->name('category.store');
// Route::get('/category/{id}', 'ApiCategoryController@show')->name('category.show');
// Route::put('/category/{id}', 'ApiCategoryController@update')->name('category.update');
// Route::delete('/category/{id}', 'ApiCategoryController@destroy')->name('category.destroy');
//

//this for get details for each category
// Route::get('/categorydetails/{id}', 'ApiCategoryDetailsController@show')->name('categorydetails.show');
// this for add rate to each category



// Route::post('/categorydetails', 'ApiCategoryDetailsController@store')->name('categorydetails.store');
// Route::get('/categorydetails', 'ApiCategoryDetailsController@all')->name('categorydetails.all');
// Route::put('/categorydetails/{id}', 'ApiCategoryDetailsController@update')->name('categorydetails.update');
// Route::delete('/categorydetails/{id}', 'ApiCategoryDetailsController@destroy')->name('categorydetails.destroy');


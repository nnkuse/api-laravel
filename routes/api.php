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

Route::group(['prefix' => 'v1', 'namespace' => 'Api\\'], function() {
    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/refresh', 'AuthController@refresh');
    Route::get('auth/logout', 'AuthController@logout');
    Route::get('auth/me', 'AuthController@me');
    // Route::Resource('listitems', 'ListItemsController');

});
// Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function () {

// });
Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('listitems', 'ListItemsController');
    Route::group(['prefix' => 'listitems', 'namespace' => 'Api\\'], function() {
        Route::apiResource('{listitem}/listofdate', 'ListOfDateController');
        Route::group(['prefix' => '{listitem}/listofdate'], function () {
            Route::apiResource('{listofdata}/listdetails', 'ListDetailsController');
        });
    });
});




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

Route::group(['prefix' => 'v1'], function() {
    Route::post('/auth/login', 'Api\AuthController@login');
    Route::post('/auth/refresh', 'Api\AuthController@refresh');
    Route::get('/auth/logout', 'Api\AuthController@logout');
    Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api'], function () {

        Route::get('/auth/me', 'AuthController@me');

        //list item
        Route::apiResource('/listitems', 'ListItemController');

        //single list item
        Route::group(['prefix' => 'listitems'], function () {
            Route::apiResource('/{listitem}/listofdates', 'ListOfDateController');

            Route::group(['prefix' => '{listitem}/listofdates'], function () {
                Route::apiResource('/{listofdate}/listdetails', 'ListDetailController');
            });
        });

    });
    // Route::group(['prefix' => 'items', 'namespace' => 'Api'], function () {
    //     Route::get('/lists', 'ListItemController@index');
    //     Route::post('/lists', 'ListItemController@store');
    //     Route::get('/lists/{id}', 'ListItemController@show');
    //     Route::put('/lists/{id}', 'ListItemController@update');
    //     Route::delete('/lists/{id}', 'ListItemController@destroy');
    // });

});
// Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function () {

// });

// Route::get('/lists', 'ListItemController@index');
// Route::post('/lists', 'ListItemController@store');
// Route::get('/lists/{id}', 'ListItemController@show');
// Route::put('/lists/{id}', 'ListItemController@update');
// Route::delete('/lists/{id}', 'ListItemController@destroy');

// Route::get('/lists/ofdate', 'ListOfDateController@index');
// Route::post('/lists/ofdate', 'ListOfDateController@store');
// Route::get('/lists/ofdate/{id}', 'ListOfDateController@show');
// Route::put('/lists/ofdate/{id}', 'ListOfDateController@update');
// Route::delete('/lists/ofdate/{id}', 'ListOfDateController@destroy');

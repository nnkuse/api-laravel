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
// SME WEB
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

// Classroom
Route::post('/login', 'AuthController@login');
Route::post('/refresh', 'AuthController@refresh');
Route::get('/logout', 'AuthController@logout');
Route::apiResource('/subjects', 'SubjectsController');
Route::group(['prefix' => 'subjects'], function () {
    Route::apiResource('/{subject}/checksin', 'SubjectCheckInController');
    Route::group(['prefix' => '/{subject}/checksin'], function () {
        Route::apiResource('/{checkin}/studentcheck', 'CheckInController');
    });
});
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'AuthController@me');
});

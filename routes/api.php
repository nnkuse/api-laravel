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
    Route::post('auth/login', 'Api\AuthController@login');
    Route::post('auth/refresh', 'Api\AuthController@refresh');
    Route::get('auth/logout', 'Api\AuthController@logout');
    Route::get('auth/me', 'Api\AuthController@me');
});
// Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Api\\'], function () {

// });

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

/*NO IMPLEMENT AUTH ROUTES*/
Route::post('login', 'Api\Auth\AuthController@login');
Route::post('register', 'Api\Auth\AuthController@register');
Route::post('recover', 'Api\Auth\AuthController@recover');
Route::post('change', 'Api\Auth\AuthController@change');


/*IMPLEMENT AUTH ROUTES*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new \App\Http\Resources\UserResource($request->user());
});

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
Route::get('verify-email/{token}', 'Api\Auth\EmailVerificationController@verify')->name('email-verify');


/*VENDORS ROUTES*/
Route::get('vendors/{vendor}', 'Api\VendorController@show');


/*UTILITY ROUTES*/
Route::get('app-url', 'Api\AppUtilityController@appUrl');
Route::post('email', 'Api\AppUtilityController@email');


/*VENDOR DASHBOARD*/
Route::post('tags', 'Api\TagController@store');
Route::post('restaurants', 'Api\VendorRestaurantController@store');


/*SHARED API*/
Route::get('tags', 'Api\TagController@index');
Route::get('categories', 'Api\CategoryController@index');
Route::get('categories/{category}/products', 'Api\CategoryController@showProducts');
Route::get('restaurants', 'Api\RestaurantController@index');
Route::get('restaurants/{restaurant}', 'Api\RestaurantController@show');
Route::get('restaurants/{restaurant}/products', 'Api\RestaurantController@showProducts');
Route::get('product/{product}/reviews', 'Api\ReviewController@index');
Route::get('products', 'Api\ProductController@index');
Route::get('products/{product}', 'Api\ProductController@show');


/*IMPLEMENT AUTH ROUTES*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return new \App\Http\Resources\UserResource($request->user());
});

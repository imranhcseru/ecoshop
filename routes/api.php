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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/admins','AdminController');
Route::apiResource('/categories','CategoryController');
Route::apiResource('/subcategories','SubCategoryController');
Route::apiResource('/products','ProductController');
Route::apiResource('/customers','CustomerController');
Route::group(['prefix'=> 'products'],function(){
    Route::apiResource('/{product}/reviews','ReviewController');
});
Route::get('/reviews','ReviewController@allReview');
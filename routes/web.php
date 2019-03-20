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
//For User Panel
//use GuzzleHttp\Client;
Route::get('/', function () {
    // $client = new \GuzzleHttp\Client([
    //     'base_uri' => 'http://127.0.0.1:8000',
    //     'defaults' => [
    //         'exceptions' => false
    //     ]
    // ]);
    // $response = $client->get('/api/categories');
    // dd($response);
    return view('userPanel.home');
});
Route::Resource('/cart','CartController');
Route::get('/category/{id}','FrontEndController@category');
Route::post('/addtocart','FrontEndController@addToCart');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//For Admin Panel
Route::Resource('/admin','AdminController');
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',function(){
        return view('adminPanel.login');
    });
    Route::post('/','AdminController@home');
});

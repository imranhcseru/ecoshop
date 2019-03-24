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
Route::get('/', 'FrontEndController@index');
Route::get('/flashsale', 'FrontEndController@flashsale');
Route::Resource('/cart','CartController');
Route::get('/category/{id}','FrontEndController@category');
Route::post('/addtocart','CartController@addToCart');
Route::post('/removefromcart','CartController@removeFromCart');
Route::get('/checkout','FrontEndController@checkout');
//Route::get('/order','OrderController@store');
Route::post('/checkout','OrderController@store');
Route::get('/customerregister',function(){
    return view('userPanel.register');
});
Route::post('/customerregister','CustomerController@store');
Route::get('/customerlogin',function(){
    return view('userPanel.login');
});
Route::post('/customerlogin','CustomerController@check');
Route::get('/customerlogout',function(){
    Session::put('customer_email',null);
    Session::put('customer_name',null);
    Session::put('phonenumber',null);
    Session::put('prodId',null);
    Session::put('prodOnCart',null);
    return Redirect::to('/');
});
Route::post('/postreview','FrontEndController@storereview');
Route::get('/products/{id}','FrontEndController@productDetails');
//Route::get('/cart','FrontEndController@cart');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Admin Panel
Route::get('subcategory/get/{id}', 'BackEndController@getSubcategory');
Route::group(['prefix'=>'admin'],function(){
    Route::get('/',function(){
        $user_email = Session::get('user_email');
        if($user_email){
            return Redirect::to('/admin/home');
        }else{
            return view('adminPanel.login');
        }
    });
    Route::get('/logout','BackEndController@logout');
    Route::post('/','AdminController@checkAdmin');
    Route::get('/home','BackEndController@home');
    Route::get('/categories','BackEndController@categories');
    Route::post('/categories','BackEndController@store_category');
    Route::get('/subcategories','BackEndController@subcategories');
    Route::post('/subcategories','BackEndController@store_subcategories');
    Route::get('/users','BackEndController@users');
    Route::get('/products','BackEndController@products');
    Route::get('/products/{id}/details','BackEndController@detail_product');
    Route::get('/products/{id}/edit','BackEndController@edit_product');
    Route::post('/products/{id}/edit','BackEndController@update_product');
    Route::get('/products/{id}/delete','BackEndController@delete_product');
    Route::get('/publishedproducts','BackEndController@published_products');
    Route::get('/products/{id}/addsupply','BackEndController@addsupply_product');
    Route::post('/products/{id}/addsupply','BackEndController@updatesupply_product');
    Route::get('/products/{id}/changetype','BackEndController@change_type');
    Route::get('/draftproducts','BackEndController@draft_products');
    Route::get('/addproduct','BackEndController@add_product');
    Route::post('/addproduct','BackEndController@store_product');
    Route::get('/addadmin',function(){
        return view('adminPanel.add_admin');
    });
    Route::post('/addadmin','AdminController@store');
    Route::get('/admins/{id}/delete','AdminController@destroy');
    Route::get('/orders','OrderController@allOrders');
    Route::get('/servedorders','OrderController@servedOrders');
    Route::get('/unservedorders','OrderController@unServedOrders');
    Route::get('/orders/{id}/serve','OrderController@serveOrder');
    Route::get('/orders/{id}/delete','OrderController@destroy');
    Route::get('/orders/{id}/details','OrderController@show');
    Route::get('/admins','AdminController@admins');
    Route::get('/reviews','BackEndController@reviews');
});


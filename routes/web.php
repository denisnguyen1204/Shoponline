<?php
use Illuminate\Support\Facades\Route;

//Route::get('test', function () {
//    \Illuminate\Support\Facades\DB::enableQueryLog();
//    $a = \App\User::has('orders')->get();
//    $x = \Illuminate\Support\Facades\DB::getQueryLog();
//    dd($x);
//});


Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister');
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);

Route::group(['middleware' => 'CheckLevel'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('home', 'AdminController@index');
    Route::resource('admin/product', 'ProductController');
    Route::resource('admin/news', 'NewsController');
    Route::resource('admin/voucher','VoucherController');
    Route::resource('admin/product-voucher','ProductVoucherController');
        Route::get('admin/user','OrderController@user')->name('user');
        Route::get('admin/order/{phone_number}','OrderController@getOrder')->name('getOrder');
    Route::resource('admin/order','OrderController');
        Route::get('admin/order-detail/{id}','OrderDetailController@get')->name('get');
    Route::resource('admin/order-detail','OrderDetailController');
});
Route::get('index','HomeController@index')->name('index');
Route::get('about','HomeController@about');
Route::get('post','HomeController@post');
Route::get('post','HomeController@show');
Route::get('about','HomeController@get');
Route::get('about','HomeController@page');
Route::get('layout/detail/{id}','HomeController@detail');
Route::post('cart','HomeController@add')->name('add');
Route::get('cart','HomeController@cart')->name("cart");
Route::delete('cart','HomeController@delete')->name('delete');
Route::post('cart/voucher','HomeController@voucher')->name('percent');
Route::post('cart/order','HomeController@order')->name('order');
Route::get('order-detail','HomeController@order_detail')->name('order_detail');
Route::get('contact','HomeController@contact');

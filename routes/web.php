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
Route::get('/', function () {
    return view('welcome');
});

Route::resource('shops','ShopController');

Route::resource('shop_categorys','Shop_categoryController');
Route::resource('shop_users','shop_userController');
Route::resource('admins','AdminController');
Route::resource('actions','ActionController');
Route::get('login','LoginController@create')->name('login');
Route::post('login','LoginController@store')->name('login');
Route::delete('logout','LoginController@destroy')->name('logout');
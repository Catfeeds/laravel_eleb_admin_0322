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
Route::resource('orders','OrderController');
Route::resource('shop_categorys','Shop_categoryController');
Route::resource('shop_users','Shop_userController');
Route::resource('admins','AdminController');
Route::resource('actions','ActionController');
Route::resource('members','MemberController');
Route::resource('rbacs','RbacController');
Route::resource('roles','RoleController');
Route::resource('navs','NavController');
Route::resource('events','EventController');
Route::resource('eventPrizes','EventPrizeController');
Route::resource('eventShops','EventShopController');

Route::get('menuCount','MenuController@menuCount')->name('menuCount');
Route::get('rand','EventShopController@rand')->name('rand');
Route::post('randcj','EventShopController@randcj')->name('randcj');

Route::get('stop','MemberController@stop')->name('stop');
Route::get('mail','Shop_userController@mail')->name('mail');


Route::get('login','LoginController@create')->name('login');
Route::post('login','LoginController@store')->name('login');
Route::get('logout','LoginController@destroy')->name('logout');


//接收文件上传的路由

Route::post('upload',function (){
    $storage=\Illuminate\Support\Facades\Storage::disk('oss');
    $fileName=$storage->putFile('upload',request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName)
    ];
})->name('upload');
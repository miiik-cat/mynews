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

//3.「http://XXXXXX.jp/XXX というアクセスが来たときに、 AAAControllerのbbbというAction に渡すRoutingの設定」を書いてみてください
Route::get('XXX', 'AAAController@bbb');

//4.web.phpを編集して、admin/profile/create にアクセスしたら ProfileController の add Action に,
//admin/profile/edit にアクセスしたら ProfileController の edit Action に割り当てるように設定してください

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create'); 
    Route::get('news', 'Admin\NewsController@index'); // 追記
    Route::get('news/edit', 'Admin\NewsController@edit'); // 追記
    Route::post('news/edit', 'Admin\NewsController@update'); // 追記
    Route::get('news/delete', 'Admin\NewsController@delete');# 追記
});

Route::get('/', 'NewsController@index');

Route::get('profile', 'ProfileController@index');
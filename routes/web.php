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


Auth::routes();

// top
Route::get('/', 'topController@index');

// auth
Route::get('/deactive', 'Auth\DeactiveController@showDeactiveForm')->name('deactive.form');
Route::post('/deactive', 'Auth\DeactiveController@deactive')->name('deactive');

// shop
Route::resource('/shops', 'ShopController')->except(['index', 'show'])->middleware('auth');
Route::resource('/shops', 'ShopController')->only(['index','show']); //一覧のみauthがいらない、一般ユーザーが閲覧できる

Route::prefix('shops')->name('shops.')->group(function(){
  Route::put('/{shop}/like','ShopController@like')->name('like')->middleware('auth');
  Route::delete('/{shop}/like','ShopController@unlike')->name('unlike')->middleware('auth');
});

// review
Route::resource('/review', 'ReviewController')->except(['index', 'show'])->middleware('auth');

// categories
Route::get('/categories', 'CategoryController@index');
Route::get('/categories/{name}', 'CategoryController@show')->name('categories.show');


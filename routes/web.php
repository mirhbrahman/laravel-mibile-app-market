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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//..........ADMIN AREA............

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dash','Admin\AdminDashController@index')->name('admin.dash');
    Route::resource('category','Admin\CategoriesController');
    Route::resource('sub-category','Admin\SubCategoriesController');
    Route::resource('product','Admin\ProductsController');
    Route::post('sub-category-auto','Admin\SubCategoriesController@getSubCategory')->name('getSubCategory');
    Route::post('file-upload','Admin\ProductsController@upload')->name('upload');
});

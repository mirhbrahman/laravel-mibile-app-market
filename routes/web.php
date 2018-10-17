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

// Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    

Route::get('/home', 'HomeController@index')->name('home');

//..........ADMIN AREA............

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dash','Admin\AdminDashController@index')->name('admin.dash');
    Route::resource('category','Admin\CategoriesController');
    Route::resource('sub-category','Admin\SubCategoriesController');
    Route::resource('product','Admin\ProductsController');
    Route::post('sub-category-auto','Admin\SubCategoriesController@getSubCategory')->name('getSubCategory');
    Route::get('image-upload/{id}','Admin\ProductsController@uploadImage')->name('product.upload.image');
    Route::post('file-upload','Admin\ProductsController@upload')->name('upload');
});

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
Route::get('portal/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('user.activate');

Route::group(['prefix' => 'portal', 'middleware' => ['auth']], function() {
    Route::get('/', 'User\UserController@index')->name('user.dashboard');
    Route::get('/profile', function () { return view('user.profile'); })->name('user.profile');
});

Route::group(['prefix' => 'tailor'], function() {
    //auth(login)
    Route::group(['namespace' => 'Auth\Tailor'], function() {
        Route::get('login', 'TailorLoginController@showLoginForm')->name('tailor.login');
        Route::post('login', 'TailorLoginController@login')->name('tailor.login.submit');
        Route::get('logout', 'TailorLoginController@logout')->name('tailor.logout');

        //auth(register)
        Route::view('register', 'auth.tailor.tailor_register');
        Route::post('register', 'TailorRegisterController@Register')->name('tailor.register');
    });

    Route::group(['namespace' => 'Tailor'], function() {
        Route::get('/', 'TailorController@index')->name('tailor.dashboard');
        Route::get('profile', function () { return view('tailor.profile'); })->name('tailor.profile');
        Route::get('stores', 'StoreController@getstores')->name('tailor.stores');
    });
});
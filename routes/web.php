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

Route::group(['prefix' => 'portal', 'middleware' => ['auth'], 'namespace' => 'User'], function() {
    Route::get('/', 'UserController@index')->name('user.dashboard');
    Route::get('designs', 'UserController@getDesigns')->name('user.designs');
    Route::post('designs/order', 'UserOrderController@create')->name('user.order.create');
    Route::get('orders', 'UserOrderController@index')->name('user.orders');
    Route::get('profile', 'ProfileController@index')->name('user.profile');
    Route::post('profile/update', 'ProfileController@update')->name('user.profile.update');
    Route::get('measurements', 'MeasurementController@getMeasurements')->name('user.measurements');
    Route::post('measurements/save', 'MeasurementController@saveMeasurement')->name('user.measurements.save');
});


Route::group(['prefix' => 'tailor'], function() {
    //Tailor Authentication & Registration
    Route::group(['namespace' => 'Auth\Tailor'], function() {
        //auth(login)
        Route::get('login', 'TailorLoginController@showLoginForm')->name('tailor.login');
        Route::post('login', 'TailorLoginController@login')->name('tailor.login.submit');
        Route::get('logout', 'TailorLoginController@logout')->name('tailor.logout');

        //auth(register)
        Route::view('register', 'auth.tailor.tailor_register');
        Route::post('register', 'TailorRegisterController@Register')->name('tailor.register');
    });

    Route::group(['namespace' => 'Tailor', 'middleware' => ['auth:tailor']], function() {

        Route::get('/', 'TailorController@index')->name('tailor.dashboard');
        Route::get('profile', 'ProfileController@index' )->name('tailor.profile');
        Route::post('profile/update', 'ProfileController@update')->name('tailor.profile.update');
        Route::get('stores', 'StoreController@getstores')->name('tailor.stores');
        Route::get('stores/{id}', 'StoreController@viewstore')->name('tailor.stores.view');
        Route::post('stores/save', 'StoreController@saveStore')->name('tailor.stores.new');
        Route::get('designs', 'DesignController@getDesigns')->name('tailor.designs');
        Route::get('designs/create', 'DesignController@createDesign')->name('tailor.designs.create');
        Route::post('designs/save', 'DesignController@saveDesign')->name('tailor.designs.save');
        Route::get('orders', 'TailorOrderController@index')->name('tailor.orders');
        Route::get('orders/{id}', 'TailorOrderController@show')->name('tailor.orders.view');
        Route::post('orders/update', 'TailorOrderController@update')->name('tailor.orders.update');

    });
});

Route::group(['prefix' => 'kdadmin'], function() {
    //Admin Authentication & Registration
    Route::group(['namespace' => 'Auth\Admin'], function () {
        //auth(login)
        Route::get('login', 'AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'AdminLoginController@login')->name('admin.login.submit');
        Route::get('logout', 'AdminLoginController@logout')->name('admin.logout');

        //auth(register)
//        Route::view('register', 'auth.admin.admin_register');
        Route::post('register', 'AdminRegisterController@Register')->name('admin.register');
    });

    Route::group(['namespace' => 'Admin', 'middleware' => ['auth:admin']], function() {

        Route::get('/', 'AdminController@index')->name('admin.dashboard');
        Route::get('orders', 'OrderController@index')->name('admin.orders');
        Route::get('tailors', 'TailorController@index')->name('admin.tailors');
        Route::get('users', 'UserController@index')->name('admin.users');
    });
});
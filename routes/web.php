<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/admin', 'AdminController@index');
Route::get('/admin-dashboard', 'AdminController@dashboard')->name('admin');

Route::group(['middleware'=> 'auth'], function () {

Route::get('/merchant-dashboard', 'MerchantController@index')->name('merchant');
Route::get('/my-shop','MerchantController@myShop')->name('myshop');
Route::Post('/my-shop','MerchantController@createMyShop');
Route::get('/my-shop/{id}','MerchantController@findShop');
Route::post('/my-shop-edit','MerchantController@updateShop');


Route::get('/create-parcel','MerchantController@getCreateParcel')->name('create-parcel');

});




Route::get('/logistic-dashboard', 'LogisticController@index')->name('logistic');


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/signup', 'MerchantController@signUp')->name('signup');
Route::post('/signup', 'MerchantController@postSignup')->name('signup-submit');



Route::get('/send-sign-in-otp/{number}',"MerchantController@sendSigninOTP");
Route::get('/merchant-register',"MerchantController@merchantRegister")->name('merchant-register');
Route::post('/merchant-register',"MerchantController@merchantRegisterSubmit")->name('merchant-register');
// Route::get('/login', 'AuthController@login')->name('login');






















Route::get('users/buyers-travelers', 'Users@buyersTravelers');
Route::resource('partial', 'AwsProductPaymentsController');

Route::group(['prefix' => 'admin', 'middleware'=> ['auth', 'permissions']], function () {

    Route::get('dashboard','DashboardController@index');


    Route::get('users/buyers-traveler-login/{id}', 'Users@buyersTravelerLogin');


    Route::resource('users', 'Users');
    Route::get('users/admins', 'Users@viewAdmins');
    Route::resource('roles', 'Roles');
    Route::post('roles/navs', 'Roles@postNavs');
    Route::any('roles/delete/{id}','Roles@destroy');
    Route::get('roles/{id}/navs', 'Roles@navs');
    Route::get('roles/{id}/permissions', 'Roles@permissions');
    Route::post('roles/permissions', 'Roles@postPermissions');
    Route::resource('navs', 'Navs', ['except' => ['show', 'destroy', 'edit']]);


    Route::resource('area', 'AreaController');
    Route::any('area/destroy/{id}', 'AreaController@destroy');
    Route::post('area/search', 'AreaController@search');

    Route::resource('hub', 'HubController');
    Route::any('hub/destroy/{id}', 'HubController@destroy');
    Route::post('hub/search', 'HubController@search');

    Route::get('warehouse', 'WarehouseController@all')->name('warehouse.index');
    Route::get('warehouse/create', 'WarehouseController@create');
    Route::get('warehouse/edit/{id}', 'WarehouseController@edit')->name('warehouse.edit');
    Route::post('warehouse/store', 'WarehouseController@store');
    Route::post('warehouse/update/{id}', 'WarehouseController@update');
    Route::any('warehouse/destroy/{id}', 'WarehouseController@destroy');
    Route::post('warehouse/search', 'WarehouseController@search');


    Route::post('permissions/search',       'Permissions@searchIndex');
    Route::post('permissions/auto-update',  'Permissions@autoUpdate');
    Route::resource('permissions', 'Permissions');

    Route::get('test','TestController@index');
    Route::get('test1','TestController@create');



});


Route::group(['middleware'=> ['auth', 'permissions']], function () {

Route::get('/warehouse-dashboard', 'WarehouseController@index')->name('warehouse');
Route::get('warehouse/scanner', 'WarehouseController@scanner')->name('warehouse.scanner');


});

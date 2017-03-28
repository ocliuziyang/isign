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


//Api
Route::group(['prefix' => 'admin/api', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {

    Route::get('me', 'Api\UserController@me');

    Route::get('users', 'Api\UserController@index');
    Route::post('user', 'Api\UserController@store');
    Route::put('user', 'Api\UserController@update');
    Route::delete('user/{id}', 'Api\UserController@delete');
    Route::put('users/import', 'Api\UserController@importUsersFromExcel');

    Route::get('downloadUsersExcelExample', 'Api\UserController@downloadUsersExcelExample');

    Route::get('buses', 'Api\BusController@index');

});



Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin'], function () {


    Route::get('login', 'AuthController@getLogin');
    Route::post('login', 'AuthController@postLogin')->name('dashboard.login');
    Route::get('logout', 'AuthController@logout')->name('dashboard.logout');
    Route::get('/', 'HomeController@index');

    Route::get('/{vue_capture?}', 'HomeController@index')->name('dashboard')->where('vue_capture', '[\/\w\.-]*');

});




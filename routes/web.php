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
    Route::get('users', 'Api\UserController@fetchUsers');
});



Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin'], function () {

    Route::get('login', 'AuthController@getLogin')->name('admin.login');
    Route::post('login', 'AuthController@postLogin')->name('admin.login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
    Route::get('/', 'HomeController@index');

    Route::get('/{vue_capture?}', 'HomeController@index')->name('admin.dashboard')->where('vue_capture', '[\/\w\.-]*');

});




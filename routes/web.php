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

Route::group(['middleware' => 'auth'],function(){
Route::get('mothercompany','MothercompanyController@index');
Route::get('mothercompany/{id}','MothercompanyController@show');
Route::post('mothercompany','MothercompanyController@store');
Route::put('mothercompany','MothercompanyController@store');

//Sub Company Routes
Route::get('subcompany','SubcompanyController@index');
Route::get('subcompany/{id}','SubcompanyController@show');
Route::post('subcompany','SubcompanyController@store');
Route::put('subcompany','SubcompanyController@store');

//Broker Company Routes
Route::get('brokercompany','BrokercompanyController@index');
Route::get('brokercompany/{id}','BrokercompanyController@show');
Route::post('brokercompany','BrokercompanyController@store');
Route::put('brokercompany','BrokercompanyController@store');
});
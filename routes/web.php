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

    //Company Routes
    Route::get('company','CompanyController@index');
    Route::get('company/create','CompanyController@create');
    Route::get('company/{id}','CompanyController@index');
    Route::post('company','CompanyController@store');
    Route::put('company','CompanyController@store');

    //Mother Company Routes
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
    Route::get('brokercompany/create','BrokercompanyController@create');
    Route::get('brokercompany/edit','BrokercompanyController@edit');
    Route::get('brokercompany/delete','BrokercompanyController@delete');
    Route::get('brokercompany/{id}','BrokercompanyController@show');
    Route::post('brokercompany','BrokercompanyController@store');
    Route::put('brokercompany','BrokercompanyController@store'); 
  
    //Mother and Sub Company Relation
    Route::get('msrelation','MothersubcompanyrelationsController@index');
    Route::get('msrelation/{id}','MothersubcompanyrelationsController@show');
    Route::post('msrelation','MothersubcompanyrelationsController@store');
    Route::put('msrelation','MothersubcompanyrelationsController@store');

});


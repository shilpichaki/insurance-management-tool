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

Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin']],function(){
    //Company Routes
    Route::get('company','CompanyController@index');
    Route::get('company/create','CompanyController@create');
    Route::get('company/edit/{id}','CompanyController@edit');
    Route::get('company/{id}','CompanyController@index');
    Route::post('company','CompanyController@store')->name('company.store');
    Route::put('company','CompanyController@store')->name('company.update');
});

Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin', 'modarator']],function(){

    //Mother Company Routes
    Route::get('mothercompany','MothercompanyController@index')->name('Mhome');
    Route::get('mothercompany/create','MothercompanyController@create');
    Route::get('mothercompany/edit/{id}','MothercompanyController@edit')->name('edit');
    Route::put('mothercompany/edit/{id}','MothercompanyController@update')->name('Mupdate');
    Route::delete('mothercompany/delete/{id}','MothercompanyController@destroy');
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
    Route::get('brokercompany','BrokercompanyController@index')->name('home');
    Route::get('brokercompany/create','BrokercompanyController@create');
    Route::get('brokercompany/edit/{id}','BrokercompanyController@edit')->name('edit');
    Route::put('brokercompany/edit/{id}','BrokercompanyController@update')->name('update');
    Route::delete('/delete/{id}',array('uses' => 'BrokercompanyController@destroy', 'as' => 'Del.route'));
    Route::get('brokercompany/{id}','BrokercompanyController@show');
    Route::post('brokercompany','BrokercompanyController@store');
    Route::put('brokercompany','BrokercompanyController@store')->name('brokercompany.store');
  
    //Mother and Sub Company Relation
    Route::get('msrelation','MothersubcompanyrelationsController@index');
    Route::get('msrelation/create','MothersubcompanyrelationsController@create');
    Route::get('msrelation/edit/{id}','MothersubcompanyrelationsController@edit');
    Route::get('msrelation/{id}','MothersubcompanyrelationsController@show');
    Route::post('msrelation','MothersubcompanyrelationsController@store')->name('msrelation.store');
    Route::put('msrelation','MothersubcompanyrelationsController@store')->name('msrelation.update');

    //Broker Company Relation
    Route::get('brelation','BrokercompanyrelationsController@index');
    Route::get('brelation/create','BrokercompanyrelationsController@create');
    Route::get('brelation/edit/{id}','BrokercompanyrelationsController@edit');
    Route::get('brelation/{id}','BrokercompanyrelationsController@show');
    Route::post('brelation','BrokercompanyrelationsController@store')->name('brelation.store');
    Route::put('brelation','BrokercompanyrelationsController@store')->name('brelation.update');

    //Customer data save Routes
    Route::get('customer','CustomerController@index');
    Route::get('customer/{id}','CustomerController@show');
    Route::post('customer','CustomerController@store');
    Route::put('customer','CustomerController@store');

    //Policy Master Routes
    Route::get('policy','PolicyController@index');
    Route::get('policy/{id}','PolicyController@show');
    Route::post('policy','PolicyController@store');
    Route::put('policy','PolicyController@store');

    //Policy Status Routes
    Route::get('policystatus','PolicystatusController@index');
    Route::get('policystatus/{id}','PolicystatusController@show');
    Route::post('policystatus','PolicystatusController@store');
    Route::put('policystatus','PolicystatusController@store');

    //Policy Order Routes 
    Route::get('policyorder','PolicyorderController@index');
    Route::get('policyorder/create','PolicyorderController@create');
    Route::get('policyorder/edit/{id}','PolicyorderController@edit');
    Route::get('policyorder/{id}','PolicyorderController@show');
    Route::post('policyorder','PolicyorderController@store')->name('policyorder.store');
    Route::put('policyorder','PolicyorderController@store')->name('policyorder.update');

    //Order statementRoutes
    Route::get('orderstatement/create','OrderStatementController@create')->name('orderstatement.create');
    Route::post('orderstatement','OrderStatementController@showform')->name('orderstatement');
});

Route::group(['middleware' => ['auth','roles'], 'roles' => ['viewer']],function(){
    
    //Order statementRoutes
    Route::get('orderstatement/create','OrderStatementController@create')->name('orderstatement.create');
    Route::post('orderstatement','OrderStatementController@showform')->name('orderstatement');
    
});
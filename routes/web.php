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

Route::post('login', 'Auth\LoginController@login');
Route::get('login',  'Auth\LoginController@showLoginForm')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('subbroker','SubBrokerController@index');
Route::get('subbroker/create','SubBrokerController@create')->name('subbroker.create');
Route::post('subbroker','SubBrokerController@store')->name('subbroker.store');

Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin']],function(){
    //Company Routes
    Route::get('company','CompanyController@index');
    Route::get('company/create','CompanyController@create');
    Route::get('company/edit/{id}','CompanyController@edit');
    Route::get('company/{id}','CompanyController@index');
    Route::post('company','CompanyController@store')->name('company.store');
    Route::put('company','CompanyController@store')->name('company.update');

    //Registration Route
    Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register','Auth\RegisterController@register');
});


Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin', 'modarator']],function(){

    //Mother Company Routes
    Route::get('mothercompany','MothercompanyController@index')->name('mothercompany.index');
    Route::get('mothercompany/create','MothercompanyController@create')->name('mothercompany.create');
    Route::get('mothercompany/edit/{id}','MothercompanyController@edit')->name('mothercompany.edit');
    Route::delete('mothercompany/delete/{id}','MothercompanyController@destroy');
    Route::post('mothercompany','MothercompanyController@store')->name('mothercompany.store');
    Route::put('mothercompany','MothercompanyController@store')->name('mothercompany.update');

    //Sub Company Routes
    Route::get('subcompany','SubcompanyController@index')->name('subcompany.index');
    Route::get('subcompany/create','SubcompanyController@create')->name('subcompany.create');
    Route::get('subcompany/edit/{id}','SubcompanyController@edit')->name('subcompany.edit');
    Route::post('subcompany','SubcompanyController@store')->name('subcompany.store');
    Route::put('subcompany','SubcompanyController@store')->name('subcompany.update');

    //Broker Company Routes
    Route::get('brokercompany','BrokercompanyController@index')->name('brokercompany.index');
    Route::get('brokercompany/create','BrokercompanyController@create')->name('brokercompany.create');
    Route::get('brokercompany/edit/{id}','BrokercompanyController@edit')->name('brokercompany.edit');
    Route::post('brokercompany','BrokercompanyController@store')->name('brokercompany.store');
    Route::put('brokercompany','BrokercompanyController@store')->name('brokercompany.update');
  
    //Mother and Sub Company Relation
    Route::get('msrelation','MothersubcompanyrelationsController@index')->name('msrelation.index');
    Route::get('msrelation/create','MothersubcompanyrelationsController@create')->name('msrelation.create');
    Route::get('msrelation/edit/{id}','MothersubcompanyrelationsController@edit')->name('msrelation.edit');
    Route::get('msrelation/{id}','MothersubcompanyrelationsController@show');
    Route::post('msrelation','MothersubcompanyrelationsController@store')->name('msrelation.store');
    Route::put('msrelation','MothersubcompanyrelationsController@store')->name('msrelation.update');

    //Broker Company Relation
    Route::get('brelation','BrokercompanyrelationsController@index')->name('brelation.index');
    Route::get('brelation/create','BrokercompanyrelationsController@create')->name('brelation.create');
    Route::get('brelation/edit/{id}','BrokercompanyrelationsController@edit');
    Route::get('brelation/{id}','BrokercompanyrelationsController@show');
    Route::post('brelation','BrokercompanyrelationsController@store')->name('brelation.store');
    Route::put('brelation','BrokercompanyrelationsController@store')->name('brelation.update');

    //Customer data save Routes
    Route::get('customer','CustomerController@index')->name('customer.home');
    Route::get('customer/create','CustomerController@create');
    Route::get('customer/edit/{id}','CustomerController@edit');
    Route::get('customer/{id}','CustomerController@show');
    Route::post('customer','CustomerController@store')->name('customer.store');
    Route::put('customer','CustomerController@store')->name('customer.update');

    //Policy Master Routes
    Route::get('policy','PolicyController@index')->name('policymaster.home');
    Route::get('policy/create','PolicyController@create')->name('policymaster.create');
    Route::get('policy/edit/{id}','PolicyController@edit');
    Route::get('policy/{id}','PolicyController@show');
    Route::post('policy','PolicyController@store')->name('policymaster.store');
    Route::put('policy','PolicyController@store')->name('policymaster.update');

    //Policy Status Routes
    Route::get('policystatus','PolicystatusController@index');
    Route::get('policystatus/{id}','PolicystatusController@show');
    Route::post('policystatus','PolicystatusController@store');
    Route::put('policystatus','PolicystatusController@store');

    //Policy Order Routes 
    Route::get('policyorder','PolicyorderController@index')->name('policyorder.home');
    Route::get('policyorder/create','PolicyorderController@create')->name('policyorder.create');
    Route::get('policyorder/policydetails/{id}','PolicyorderController@policydetails');
    Route::get('policyorder/edit/{id}','PolicyorderController@edit');
    Route::get('policyorder/{id}','PolicyorderController@show');
    Route::post('policyorder','PolicyorderController@store')->name('policyorder.store');
    Route::put('policyorder','PolicyorderController@store')->name('policyorder.update');

    //Policy Order Payment Recovery Routes 
    Route::get('policyrecoverydata','PolicyrecoverydataController@index')->name('policyrecoverydata.home');
    Route::get('policyrecoverydata/create/{orderid}','PolicyrecoverydataController@create')->name('policyrecoverydata.create');
    Route::get('policyrecoverydata/edit/{id}','PolicyrecoverydataController@edit');
    Route::get('policyrecoverydata/{id}','PolicyrecoverydataController@show');
    Route::post('policyrecoverydata','PolicyrecoverydataController@store')->name('policyrecoverydata.store');
    Route::put('policyrecoverydata','PolicyrecoverydataController@store')->name('policyrecoverydata.update');

    //Payment Received Routes 
    Route::get('paymentreceive','PaymentRecivedController@index')->name('paymentreceive.home');
    Route::get('paymentreceive/create','PaymentRecivedController@create')->name('paymentreceive.create');
    Route::get('paymentreceive/orderdetails/{companyid}/{companytype}','PaymentRecivedController@orderdetails');
    Route::get('paymentreceive/edit/{id}','PaymentRecivedController@edit');
    Route::get('paymentreceive/{id}','PaymentRecivedController@show');
    Route::post('paymentreceive','PaymentRecivedController@store')->name('paymentreceive.store');
    Route::put('paymentreceive','PaymentRecivedController@store')->name('paymentreceive.update');

    Route::get('country','CountryController@index');
});

Route::group(['middleware' => ['auth','roles'], 'roles' => ['admin', 'modarator', 'viewer']],function(){
    
    //Order statementRoutes
    Route::get('orderstatement/create','OrderStatementController@create')->name('orderstatement.create');
    Route::post('orderstatement','OrderStatementController@showform')->name('orderstatement');
    Route::get('orderstatement/hierarchy/{orderid}','OrderStatementController@hierarchy')->name('orderstatement.hierarchy');
    
    //User Profile update Route
    Route::get('profile','UserController@edit')->name('profile.edit');
    Route::post('profile','UserController@store')->name('paymentreceive.update');
});

//Shilpi added two new route group to give permission to SpecialAdmin and SubBroker on 10.01.2019
Route::group(['middleware' => ['auth' , 'roles'], 'roles' => ['SpecialAdmin']], function(){
    //Policy Master Routes
    Route::get('policy','PolicyController@index')->name('policymaster.home');
    Route::get('policy/create','PolicyController@create')->name('policymaster.create');
    Route::get('policy/edit/{id}','PolicyController@edit');
    Route::get('policy/{id}','PolicyController@show');
    Route::post('policy','PolicyController@store')->name('policymaster.store');
    Route::put('policy','PolicyController@store')->name('policymaster.update');
});

Route::group(['middleware' => ['auth' , 'roles'], 'roles' => ['SubBroker']], function(){
    //Home Route
    // Route::get('home','HomeController@index')->name('home');
    //Registration Route
    // Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register','Auth\RegisterController@register');
    Route::get('subbrokerdata','SubbrokerDataController@index')->name('subbrokerdata.home');
});
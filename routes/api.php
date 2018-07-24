<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login','Api\PassportController@login');
Route::post('register','Api\PassportController@register');

Route::group(['middleware' => 'auth:api'],function(){
    Route::post('get-details','Api\PassportController@getEmployeeDetails');

    //Mother Company Routes
    Route::get('company','MothercompanyController@index');
    Route::get('company/{id}','MothercompanyController@show');
    Route::post('company','MothercompanyController@store');
    Route::put('company','MothercompanyController@store');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

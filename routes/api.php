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
    // Route::get('mothercompany','MothercompanyController@index');
    // Route::get('mothercompany/{id}','MothercompanyController@show');
    // Route::post('mothercompany','MothercompanyController@store');
    // Route::put('mothercompany','MothercompanyController@store');

    // //Sub Company Routes
    // Route::get('subcompany','SubcompanyController@index');
    // Route::get('subcompany/{id}','SubcompanyController@show');
    // Route::post('subcompany','SubcompanyController@store');
    // Route::put('subcompany','SubcompanyController@store');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

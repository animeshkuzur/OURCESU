<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login' ,['as' => 'login', 'uses' => 'AuthController@login']);
Route::post('/loginvalidate' ,['as' => 'loginvalidate', 'uses' => 'AuthController@loginvalidate']);
Route::get('/register',['as' => 'register', 'uses' => 'AuthController@register']);
Route::post('/registervalidate',['as'=>'registervalidate','uses'=>'AuthController@registervalidate']);

Route::group(['prefix'=>'api'],function(){
	Route::post('/login', ['uses'=>'ApiAuthController@apilogin']);
});
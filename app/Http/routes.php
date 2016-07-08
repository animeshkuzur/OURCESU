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

Route::resource('user','UserController',['only'=>['create','store']]);

Route::get('/dashboard',['middleware' => 'auth', 'as'=>'dashboard','uses'=>'UserController@dashboard']);
Route::get('/logout',['as'=>'logout','uses'=>'AuthController@logout']);

Route::group(['prefix'=>'api'],function(){
	Route::post('/login', ['uses'=>'ApiAuthController@apilogin']);
	Route::post('/register',['uses'=>'UserController@apiregister']);
		Route::post('/logout',['uses' => 'ApiAuthController@apilogout']);
		Route::get('/getuser',['uses' => 'ApiAuthController@apiauthenticatedUser']);
		Route::get('/gettoken',['uses' => 'ApiAuthController@getToken']);
});


Route::get('/forgot',['as'=>'forgot','uses'=>'AuthController@forgot']);
Route::post('/handleforgot',['as'=>'handleforgot', 'uses' => 'AuthController@handleforgot']);

Route::any('/{page?}',function(){
  return View::make('errors.503');
})->where('page','.*');
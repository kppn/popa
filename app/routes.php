<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});



// POPA Account user registration / login / logout
Route::get( 'user/logout', array('uses' => 'UserController@doLogout'));
Route::get( 'user/login',  array('uses' => 'UserController@index'));
Route::get( 'user/home',   array('uses' => 'UserController@home'));
Route::post('user/login',  array('uses' => 'UserController@doLogin'));

// SNS Account user registration / login / logout
Route::get( '/oauthfacebook', 'UserController@oauthFacebook');
Route::get( '/oauthtwitter',  'UserController@oauthTwitter');
Route::post('user/page',      'UserController@registerSNS');

// User REST Default
Route::resource('user', 'UserController');


Route::get('user/order', array('uses' => 'OrderController@index'));
Route::post('user/order', array('uses' => 'OrderController@createOrder'));
Route::post('user/orderPayment', array('uses' => 'OrderController@createOrderPayment'));
Route::post('user/orderConfirm', array('uses' => 'OrderController@createOrderConfirm'));
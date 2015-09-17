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

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/
Route::get('/', 'OrderController@top');


Route::get('home', function()
{
	return View::make('home');
});

// User REST Default
//Route::resource('user', 'UserController');
Route::get( 'user',        'UserController@index');
Route::get( 'user/create', 'UserController@create');
Route::post('user',        'UserController@store');

// POPA Account user registration / login / logout
Route::get( 'user/logout', array('uses' => 'UserController@doLogout'));
Route::get( 'user/login',  array('uses' => 'UserController@index'));
Route::get( 'user/home',   array('uses' => 'UserController@home'));
Route::post('user/login',  array('uses' => 'UserController@doLogin'));

// SNS Account user registration / login / logout
Route::get( '/oauthfacebook', 'UserController@oauthFacebook');
Route::get( '/oauthtwitter',  'UserController@oauthTwitter');
Route::post('user/page',      'UserController@registerSNS');

// Order
Route::get('user/orderDate', array('uses' => 'OrderController@getOrderDate'));
Route::get( 'user/order',        array('uses' => 'OrderController@index'));
Route::post('user/order',        array('uses' => 'OrderController@createOrder'));
Route::post('user/orderPayment', array('uses' => 'OrderController@createOrderPayment'));
Route::post('user/orderConfirm', array('uses' => 'OrderController@createOrderConfirm'));

/*
Route::get('post', function()
{
        return View::make('post');
});

Route::post('post', function()
{
        return View::make('post');
});
*/
Route::get('post/{id}', 'OrderController@orderDetail');



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

/*
Route::get('/home', 'HomeController@showWelcome');
*/

//トピックのルーティング(Adminツール)
Route::group(['prefix' => 'admin'], function() {
	Route::get('/'				,'HomeController@control_index');
	Route::get('/topics/index'	,'TopicController@control_index');
});

//トピックのルーティング(ガワアプリ)
Route::get('/topics/index'	,'TopicController@index');

/*
Route::get('/topics/{id}', 'TopicController@show');
*/
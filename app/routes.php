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
Route::group(array('before' => 'auth.basic.admin'), function(){
	Route::group(['prefix' => 'admin'], function() {
		//Adminツール：top
		Route::get(  '/'					 	  ,'HomeController@control_index');
		//Adminツール：最新情報
		Route::get(  '/topics/index'		 	  ,'TopicController@control_index');
		Route::get(  '/topics/add'			 	  ,'TopicController@control_add');
		Route::post( '/topics/add_complete'	 	  ,'TopicController@control_add_complete');
		Route::get(  '/topics/edit/{id}'	 	  ,'TopicController@control_edit');
		Route::post( '/topics/edit_complete' 	  ,'TopicController@control_edit_complete');
		Route::get(  '/topics/delete/{id}'	 	  ,'TopicController@control_delete');
	});
});

//トピックのルーティング(ガワアプリ)
Route::get('/topics/index'	,'TopicController@index');

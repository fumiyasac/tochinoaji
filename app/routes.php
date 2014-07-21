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
		//Adminツール：スライド
		Route::get(  '/slides/index'		 	  ,'SlideController@control_index');
		Route::get(  '/slides/add'			 	  ,'SlideController@control_add');
		Route::post( '/slides/add_complete'	 	  ,'SlideController@control_add_complete');
		Route::get(  '/slides/edit/{id}'	 	  ,'SlideController@control_edit');
		Route::post( '/slides/edit_complete' 	  ,'SlideController@control_edit_complete');
		Route::get(  '/slides/delete/{id}'	 	  ,'SlideController@control_delete');
		//Adminツール：バナー広告
		Route::get(  '/banners/index'		 	  ,'BannerController@control_index');
		Route::get(  '/banners/add'			 	  ,'BannerController@control_add');
		Route::post( '/banners/add_complete'	  ,'BannerController@control_add_complete');
		Route::get(  '/banners/edit/{id}'	 	  ,'BannerController@control_edit');
		Route::post( '/banners/edit_complete' 	  ,'BannerController@control_edit_complete');
		Route::get(  '/banners/delete/{id}'	 	  ,'BannerController@control_delete');
	});
});

//トピックのルーティング(ガワアプリ)
Route::get('/topics/index'	,'TopicController@index');

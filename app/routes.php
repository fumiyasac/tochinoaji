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
		//Adminツール：特集記事
		Route::get(  '/specials/index'		 	  ,'SpecialController@control_index');
		Route::get(  '/specials/add'			  ,'SpecialController@control_add');
		Route::post( '/specials/add_complete'	  ,'SpecialController@control_add_complete');
		Route::get(  '/specials/edit/{id}'	 	  ,'SpecialController@control_edit');
		Route::post( '/specials/edit_complete' 	  ,'SpecialController@control_edit_complete');
		Route::get(  '/specials/delete/{id}'	  ,'SpecialController@control_delete');
		Route::get(  '/specials/view/{id}'	 	  ,'SpecialController@control_view');
		//Adminツール：店舗記事
		Route::get(  '/shops/index'		 	  	  ,'ShopController@control_index');
		Route::get(  '/shops/add'			  	  ,'ShopController@control_add');
		Route::post( '/shops/add_complete'	  	  ,'ShopController@control_add_complete');
		Route::get(  '/shops/edit/{id}'	 	  	  ,'ShopController@control_edit');
		Route::post( '/shops/edit_complete'   	  ,'ShopController@control_edit_complete');
		Route::get(  '/shops/delete/{id}'	  	  ,'ShopController@control_delete');
		Route::get(  '/shops/view/{id}'	 	  	  ,'ShopController@control_view');
	});
});

//トピックのルーティング(ガワアプリ)

//ガワアプリ：最新情報
Route::get('/topics/index'	,'TopicController@index');

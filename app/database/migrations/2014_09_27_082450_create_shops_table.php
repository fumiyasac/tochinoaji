<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//@todo:shopsのカラムを追加する
		Schema::create('shops', function(Blueprint $table)
		{
			$table->bigIncrements('shop_id');
			$table->string('title', 256);
			$table->string('kcpy', 256);
			$table->text('main_text');
			
			$table->string('mainimg_file_name', 256);
			$table->integer('mainimg_file_size');
			$table->string('mainimg_content_type', 256);
			$table->dateTime('mainimg_updated_at'); //dateTime => timestampへ変更
			
			$table->string('sub1img_file_name', 256);
			$table->integer('sub1img_file_size');
			$table->string('sub1img_content_type', 256);
			$table->dateTime('sub1img_updated_at'); //dateTime => timestampへ変更
			
			$table->string('sub2img_file_name', 256);
			$table->integer('sub2img_file_size');
			$table->string('sub2img_content_type', 256);
			$table->dateTime('sub2img_updated_at'); //dateTime => timestampへ変更

			$table->string('sub3img_file_name', 256);
			$table->integer('sub3img_file_size');
			$table->string('sub3img_content_type', 256);
			$table->dateTime('sub3img_updated_at'); //dateTime => timestampへ変更

			$table->string('sub4img_file_name', 256);
			$table->integer('sub4img_file_size');
			$table->string('sub4img_content_type', 256);
			$table->dateTime('sub4img_updated_at'); //dateTime => timestampへ変更
			
			$table->string('gurunabi_api_id', 256);
			$table->string('hotpepper_api_id', 256);
			$table->string('livedoor_api_id', 256);
			$table->string('suntory_api_id', 256);
			
			$table->string('other_title', 256);
			$table->text('other_text');
			$table->date('published');
			$table->integer('flag');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
			/*
				2014.09.27 カラム変更
				カラム名：mainimg_updated_at
				dateTime => timestampへ変更
				カラム名：sub1img_updated_at
				dateTime => timestampへ変更
				カラム名：sub2img_updated_at
				dateTime => timestampへ変更
				カラム名：sub3img_updated_at
				dateTime => timestampへ変更
				カラム名：sub4img_updated_at
				dateTime => timestampへ変更
			*/
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}

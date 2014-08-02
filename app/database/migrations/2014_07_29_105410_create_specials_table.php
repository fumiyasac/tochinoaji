<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//@todo:specialsのカラムを追加する
		Schema::create('specials', function(Blueprint $table)
		{
			$table->bigIncrements('special_id');
			$table->string('title', 256);
			$table->string('kcpy', 256);
			$table->text('main_text');
			$table->string('mainimg_file_name', 256);
			$table->integer('mainimg_file_size');
			$table->string('mainimg_content_type', 256);
			$table->dateTime('mainimg_updated_at'); //dateTime => timestampへ変更
			$table->string('sub1_title', 256);
			$table->text('sub1_text');
			$table->string('sub1img_file_name', 256);
			$table->integer('sub1img_file_size');
			$table->string('sub1img_content_type', 256);
			$table->dateTime('sub1img_updated_at'); //dateTime => timestampへ変更
			$table->string('sub2_title', 256);
			$table->text('sub2_text');
			$table->string('sub2img_file_name', 256);
			$table->integer('sub2img_file_size');
			$table->string('sub2img_content_type', 256);
			$table->dateTime('sub2img_updated_at'); //dateTime => timestampへ変更
			$table->string('other_title', 256);
			$table->text('other_text');
			$table->date('published');
			$table->integer('flag');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
			/*
				2014.07.29 カラム変更
				カラム名：mainimg_updated_at
				dateTime => timestampへ変更
				カラム名：sub1img_updated_at
				dateTime => timestampへ変更
				カラム名：sub2img_updated_at
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//@todo:bannersのカラムを追加する
		Schema::create('banners', function(Blueprint $table)
		{
			$table->bigIncrements('banner_id');
			$table->string('title', 256);
			$table->text('description');
			$table->string('eyecatch_file_name', 256);
			$table->integer('eyecatch_file_size');
			$table->string('eyecatch_content_type', 256);
			$table->dateTime('eyecatch_updated_at'); //dateTime => timestampへ変更
			$table->date('published_start');
			$table->date('published_end');
			$table->integer('flag');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
			/*
				2014.07.21 カラム変更
				カラム名：eyecatch_updated_at
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

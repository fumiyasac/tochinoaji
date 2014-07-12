<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//@todo:slidesのカラムを追加する
		Schema::create('slides', function(Blueprint $table)
		{
			$table->bigIncrements('slide_id');
			$table->string('title', 256);
			$table->text('description');
			$table->string('eyecatch_file_name', 256);
			$table->integer('eyecatch_file_size');
			$table->string('eyecatch_content_type', 256);
			$table->dateTime('eyecatch_updated_at'); //dateTime => timestampへ変更
			$table->date('published');
			$table->integer('flag');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
			/*
				2014.07.04 カラム変更
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

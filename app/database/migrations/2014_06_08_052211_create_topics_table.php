<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('topics', function(Blueprint $table)
		{
			$table->bigIncrements('topic_id');
			$table->string('title', 256);
			$table->text('description');
			$table->string('topic_image', 256);
			$table->date('published');
			$table->integer('flag');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			
			/*
				2014.06.29 カラム追加
				カラム名：eyecatch_file_name => varchar(256)
				カラム名：eyecatch_file_size => int(11)
				カラム名：eyecatch_comtent_type => varchar(256)
				カラム名：eyecatch_updated_at => timestamp
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
		Schema::table('topics', function(Blueprint $table)
		{
			//
		});
	}

}

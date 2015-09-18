<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('num', 255);
			$table->integer('relative_post_id')->nullable();
			$table->integer('user_id');
			$table->integer('order_id');
			$table->text('post');
			$table->string('pop_filename', 255)->nullable();
			$table->string('other_filename', 255)->nullable();
			$table->integer('got_prize')->nullable();
			$table->integer('got_point')->nullable();
			
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}

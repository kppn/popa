<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('points', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('num_point');
			$table->integer('user_id');
			$table->datetime('imcome_at');
			$table->datetime('change_request_at')->nullable();
			$table->datetime('change_finished_at')->nullable();
			$table->integer('status');
			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('points');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceStageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('service_stage', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('money');
			$table->integer('point');
			$table->integer('order_low_term');
			$table->integer('order_high_term');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('service_stage');
	}

}

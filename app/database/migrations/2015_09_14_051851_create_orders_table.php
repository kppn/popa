<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('num');
			$table->integer('user_id');

			$table->text('store_name');
			$table->integer('store_name_publication');

			$table->string('postal_code', 255);
			$table->string('phone_number', 255);

			$table->text('title');
			$table->text('description');

			$table->string('list_image_filename1', 255);
			$table->string('list_image_filename2', 255)->nullable();
			$table->string('list_image_filename3', 255)->nullable();
			$table->string('list_image_filename4', 255)->nullable();
			$table->string('list_image_filename5', 255)->nullable();

			$table->integer('term');

			$table->datetime('state0_at')->nullable();
			$table->datetime('state1_at')->nullable();
			$table->datetime('state2_at')->nullable();
			$table->datetime('state3_at')->nullable();
			$table->datetime('state4_at')->nullable();
			$table->datetime('state5_at')->nullable();
			$table->datetime('state6_at')->nullable();
			$table->datetime('state7_at')->nullable();
			$table->datetime('state8_at')->nullable();
			$table->datetime('state9_at')->nullable();
			$table->datetime('state10_at')->nullable();

			$table->integer('category_id');
			$table->integer('target_customer_sex');
			$table->integer('target_customer_age');

			$table->integer('payment_order');
			$table->integer('num_comment');
			$table->integer('num_view');
			$table->string('num_pop');

			$table->integer('money');
			$table->integer('point');

			$table->datetime('closed_at')->nullable();
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
		Schema::drop('orders');
	}

}

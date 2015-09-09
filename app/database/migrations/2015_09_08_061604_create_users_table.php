<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nicname', 255);
			$table->string('provider', 255)->nullable();
			$table->string('uid', 255)->nullable();
			$table->string('acc_name', 255);
			$table->string('real_name', 255)->nullable();
			$table->string('email', 255);
			$table->string('password_digest', 255);
			$table->integer('sign_in_count');
			$table->datetime('sign_in_at')->nullable();
			$table->string('sign_in_ip', 255)->nullable();
			$table->string('remember_token', 255)->nullable();
			$table->integer('activated');
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
		Schema::drop('users');
	}

}

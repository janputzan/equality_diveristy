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
		Schema::create('users', function($table)
		{
		    $table->increments('id');
		    $table->string('email');
		    $table->string('password');
		    $table->string('first_name');
		    $table->string('last_name');
		    $table->integer('manager_id')->unsigned()->nullable();

		    $table->timestamps();

		    $table->index('email');
		    $table->index('manager_id');
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

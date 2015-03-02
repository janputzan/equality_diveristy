<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tests', function($table)
		{
		    $table->increments('id');
		    $table->integer('user_id');
		    $table->date('date_taken');

		    $table->index('user_id');
		    $table->index('date_taken');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tests')
	}

}

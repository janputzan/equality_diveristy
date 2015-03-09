<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->boolean('result');

			$table->index('test_id');
			$table->index('question_id');
			$table->index('result');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_questions');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_test', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('test_id')->unsigned();
			$table->integer('question_id')->unsigned();
			$table->integer('answer_id')->unsigned()->nullable();
			$table->boolean('result')->nullable();
			$table->timestamps();

			$table->index('test_id');
			$table->index('question_id');
			$table->index('answer_id');
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
		Schema::drop('question_test');
	}

}

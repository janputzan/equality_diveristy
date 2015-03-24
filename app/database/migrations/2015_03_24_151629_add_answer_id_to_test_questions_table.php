<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswerIdToTestQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('test_questions', function(Blueprint $table)
		{
			$table->integer('answer_id')->unsigned()->nullable()->after('question_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('test_questions', function(Blueprint $table)
		{
			$table->dropColumn('answer_id');
		});
	}

}

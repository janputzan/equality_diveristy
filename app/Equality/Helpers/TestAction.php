<?php namespace Helpers;

use Characteristic;
use MainArea;
use Question;
use Test;
use Auth;
use Session;
use Answer;
use DB;

class TestAction {

	/**
	* @return array
	*/
	static public function prepare() {

		$user = Auth::user();

		$testQuestions = array();

		foreach (Characteristic::all() as $characteristic) {

			foreach (MainArea::all() as $mainArea) {

				// $availableQuestions = Question::where('main_area_id', '=', $mainArea->id)
				// 						->where('characteristic_id', '=', $characteristic->id)
				// 						->whereNotIn('id',TestAction::getQuestionsTaken($user))
				// 						->get();

				$availableQuestions = TestAction::getQuestionsAvailable($user)
										->where('characteristic_id', '=', $characteristic->id)
										->where('main_area_id', $mainArea->id);

				// $_len = $availableQuestions->count() - 1;

				// $count = rand(0,$_len);
				
				array_push($testQuestions, $availableQuestions->get()->random(1));
			}
		}

		$test = new Test;

		$test->user_id = $user->id;
		$test->save();

		$ids = array();

		foreach ($testQuestions as $key => $value) {
			
			array_push($ids, $value->id);
			
		}


		// dd($ids);

		$test->questions()->sync($ids);

		return $testQuestions; 
	}

	static public function getQuestionsTaken($user) {

		$testIds = $user->tests->lists('id');

		$ids = DB::table('question_test')->whereIn('test_id', $testIds)->lists('question_id');

		return Question::whereIn('id', $ids);
	}

	static public function getQuestionsAvailable($user) {

		$testIds = $user->tests->lists('id');

		$ids = DB::table('question_test')->whereIn('test_id', $testIds)->lists('question_id');

		return Question::whereNotIn('id', $ids);

	}

	static public function processQuestion($question_id, $answer_id) {


		$test = Test::find(Session::get('user.test.id'));
		$question = Question::find($question_id);
		$answer = Answer::find($answer_id);

		// dd(array('test' => $test, 'question' => $question, 'answer' => $answer));
		if ($test && $question && $answer) {

			$result = $answer->is_right;

			$test->questions()->attach($question->id, array('answer_id' => $answer->id, 'result' => $result));

			Session::push('user.test.results', array(
				'category_id' 	=> $question->characteristic->id,
				'question' 	=> $question->body,
				'answer' 	=> $question->rightAnswer()->body,
				'result' 	=> $result));

			return true;
		}

		return false;
	}

}
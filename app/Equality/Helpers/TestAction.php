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

				$availableQuestions = TestAction::getQuestionsAvailable($user)
										->where('characteristic_id', '=', $characteristic->id)
										->where('main_area_id', $mainArea->id);

				array_push($testQuestions, $availableQuestions->get()->random(1));
			}
		}
		if (count($testQuestions) == 0) {

			return false;
		}

		$test = new Test;

		$test->user_id = $user->id;
		$test->save();

		$ids = array();

		foreach ($testQuestions as $key => $value) {
			
			array_push($ids, $value->id);
		}

		$test->questions()->sync($ids);

		$response = array('test' => $test, 'question' => $testQuestions[0]);

		return $response; 
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

	static public function processQuestion($test, $question_id, $answer_id) {

		$result = Answer::find($answer_id)->isRight();

		$test->questions()->updateExistingPivot($question_id, array('answer_id' => $answer_id, 'result' => $result));

		return false;

	}

	static public function isFinished($test) {

		foreach ($test->questions as $questions) {
			
			if ($questions->pivot->answer_id == null) {

				return false;
			}
		}

		return true;
	}

	static public function getUnfinished($user) {

		foreach ($user->tests as $test) {

			if (TestAction::countLeftQuestions($test)) {

				return $test;
			}
		}

		return false;
	}

	static public function getFirstQuestion($test) {

		return $test->questions()->wherePivot('answer_id', '=', null)->first();
	}

	static public function countLeftQuestions($test) {

		if ($test) {

			return $test->questions()->wherePivot('answer_id', '=', null)->count();
		}

		return false;
	}

	static public function getResult($test) {

		if ($test) {

			return $test->questions()->wherePivot('result', '=', true)->count();
		}

		return false;
	}

	public static function attemptsCount($user) {

		$count = 0;

		foreach ($user->tests as $test) {

			if (TestAction::isFinished($test)) {

				$count++;
			}
		}

		return $count;
	}

	public static function hasUnfinished($user) {

		foreach ($user->tests as $test) {
			
			if (!TestAction::isFinished($test)) {

				return true;
			}
		}

		return false;
	}

}
<?php namespace Helpers;

use Characteristic;
use MainArea;
use Question;
use Test;
use Auth;
use Session;
use Answer;

class TestAction {

	/**
	* @return array
	*/
	static public function prepare() {

		$user = Auth::user();

		$testQuestions = array();

		foreach (Characteristic::all() as $characteristic) {

			foreach (MainArea::all() as $mainArea) {

				$availableQuestions = Question::where('main_area_id', '=', $mainArea->id)
										->where('characteristic_id', '=', $characteristic->id)
										->whereNotIn('id',TestAction::getQuestionsTaken($user))
										->get();

				$_len = $availableQuestions->count() - 1;

				$count = rand(0,$_len);
				
				array_push($testQuestions, array('id' => $availableQuestions[$count]->id));
			}
		}

		return $testQuestions; 
	}

	static public function getQuestionsTaken($user) {

		$questionsTaken = array();

		foreach(Test::with('questions')->where('user_id', '=', $user->id)->get() as $test) {

			foreach($test->questions as $question) {

				array_push($questionsTaken, array($question->id));
			}
		}

		return $questionsTaken;
	}

	static public function startTest() {

		$test = new Test;

		$test->user_id = Auth::user()->id;

		$test->save();

		return $test->id;

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
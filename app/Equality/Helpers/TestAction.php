<?php namespace Helpers;

use Characteristic;
use MainArea;
use Question;
use Test;

class TestAction {

	/**
	* @return array
	*/
	static public function prepare($user) {

		$testQuestions = array();

		foreach (Characteristic::all() as $characteristic) {

			foreach (MainArea::all() as $mainArea) {

				$availableQuestions = Question::where('main_area_id', '=', $mainArea->id)
										->where('characteristic_id', '=', $characteristic->id)
										->whereNotIn('id',TestAction::getQuestionsTaken($user))
										->get();

				$_len = $availableQuestions->count();

				$count = rand(0,$_len-1);
				
				array_push($testQuestions, array('id' => $availableQuestions[$count]->id));
			}
		}

		return $testQuestions; 
	}

	static public function getQuestionsTaken($user) {

		$questionsTaken = array();

		foreach(Test::with('questions')->where('user_id', '=', $user->id)->get() as $test) {

			array_push($questionsTaken, array($test->questions->id));
		}

		return $questionsTaken;
	}

}
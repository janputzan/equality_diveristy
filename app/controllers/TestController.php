<?php

use Helpers\TestAction;

class TestController extends BaseController {

	public function __construct() {

		parent::__construct();
	}
	public function showStart()	{

		if (Auth::user()->tests->count() >= 3) {

			return Redirect::back()->with('errorMessage', 'You run out of available attempts. Please contact the administrator');
		}

		return View::make('test.start');
	}

	public function startTest() {

		if (Request::ajax()) {

			if (Auth::user()->tests->count() >= 3) {

				return Response::json(array('status' => 0));
			}

			if (!Session::has('user.test.questions')) {

				$questions = TestAction::prepare(Auth::user());

				foreach ($questions as $question) {


					Session::push('user.test.questions', $question['id']);
				}
			}


			return Response::json(array('status' => 1));
			
		}

	}

	public function nextQuestion() {

		$count = Session::has('user.test.questions.count') ? Session::get('user.test.questions.count') : 0;

		// dd(Session::get('user.test.questions.count'));

		if (Request::ajax()) {

			if (Session::has('user.test.questions') && $count < 27) {

				$question = Question::with('answers')->find(Session::get('user.test.questions.'.$count));

				$answers = array();

				foreach($question->answers as $answer) {

					array_push($answers, array('id' => $answer->id, 'body' => $answer->body));
				}

				$response = array(
					'status' 		=> 1,
					'question_id' 	=> $question->id,
					'question_body' => $question->body,
					'answers' 		=> $answers,
					'count' 		=> $count + 1);

				Session::put('user.test.questions.count', ++$count);
			
			} else {

				$response = array('status' => 0);
				Session::forget('user.test.questions');
				Session::forget('user.test.questions.count');
			}



			return Response::json($response);
		}

		return Redirect::route('home');

	}

	public function skipQuestion() {


	}

	public function saveProgress() {

		
	}

}

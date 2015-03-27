<?php

use Helpers\TestAction;

class TestController extends BaseController {

	public function __construct() {

		parent::__construct();
	}
	public function showStart()	{

		/* Change the value of this to limit test attempts*/

		if (Auth::user()->tests->count() >= 3) {

			return Redirect::back()->with('errorMessage', 'You run out of available attempts. Please contact the administrator');
		}

		// if (!Session::has('user.test.questions')) {

			$questions = TestAction::prepare();

			Session::put('user.test.questions', $questions);

			// Session::put('user.test.id', TestAction::startTest());
		// }

		// $d = TestAction::prepare(Auth::user());

		// $a = array_pop($d);
			
			var_dump(Session::get('user.test.questions'));
die;
		return View::make('test.start');
	}

	// public function startTest() {

	// 	if (Request::ajax()) {

	// 		/* Change the value of this to limit test attempts*/

	// 		if (Auth::user()->tests->count() >= 5) {

	// 			return Response::json(array('status' => 0));
	// 		}



	// 		return Response::json(array('status' => 1));
	// 	}

	// }

	public function nextQuestion() {

		// $hasBeenAnswered = false;
		if (Request::ajax()) {

			// if (Session::has('user.test.questions')) {

				$count = 27 - count(Session::get('user.test.questions'));

				// if ($count != 0) {

				// 	$hasBeenAnswered = TestAction::processQuestion(Input::get('question_id'), Input::get('answer_id'));
				// }

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

				// if ($hasBeenAnswered) {

					Session::forget('user.test.questions.'.$count);

					// $response['count'] += 1; 
				// }
				
				if (count(Session::get('user.test.questions')) == 0) {

					Session::forget('user.test.questions');
				}
			
			// } else {

			// 	if (Session::has('user.test.results')) {

			// 		$response = array(
			// 			'status' => 2,
			// 			'results' => Session::get('user.test.results'));

			// 		Session::forget('user.test.results');

			// 	} else {

			// 		$response = array('status' => 0);
			// 	}
			// }

			return Response::json($response);
		}

		return Redirect::route('home');

	}

	public function skipQuestion() {


	}

	public function saveProgress() {

		
	}

	public function processAnswer() {

		if (Request::ajax()) {

			if (TestAction::processQuestion(Input::get('question_id'), Input::get('answer_id'))) {

				return Response::json(array('status' => 1));
			}

			return Response::json(array('status' => 0));

		}

		return Redirect::route('home');
	}

}

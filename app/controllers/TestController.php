<?php

use Helpers\TestAction;

class TestController extends BaseController {

	public function __construct() {

		parent::__construct();
	}
	public function showStart()	{

		/* Change the value of this to limit test attempts*/

		$test = TestAction::getUnfinished(Auth::user());


		if ($test) {

			$question = TestAction::getFirstQuestion($test);

		} else {

			if (Auth::user()->tests->count() >= 3) {

				return Redirect::back()->with('errorMessage', 'You run out of available attempts. Please contact the administrator');
			}

			$response = TestAction::prepare(Auth::user());

			$question = $response['question'];

			$test = $response['test'];

			if (!$question) {

				return Redirect::back()->with('errorMessage', 'No more questions available. Please contact the administrator');
			}
		}

		$count = 28 - TestAction::countLeftQuestions($test);

		JavaScript::put(array('test_id' => $test->id));

		return View::make('test.start')->with('question', $question)->with('count', $count);
	}

	public function nextQuestion() {

		if (Request::ajax()) {

			$data = Input::all();

			$test = Test::find($data['test_id']);

			TestAction::processQuestion($test, $data['question_id'], $data['answer_id']);

			$question = TestAction::getFirstQuestion($test);

			if ($question) {

				$count = 28 - TestAction::countLeftQuestions($test);

				$answers = array();

				foreach ($question->answers as $answer) {

					array_push($answers, array('answer_id' => $answer->id,
												'answer_body' => $answer->body));
				}

				$response = array('question_id' => $question->id,
									'question_body' => $question->body,
									'answers' => $answers,
									'count' => $count,
									'category' => $question->characteristic->name);
				
			} else {

				$result = TestAction::getResult($test);

				$response = array('finished' => 'true', 'result' => $result);
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

<?php

use Helpers\Result;

class ResultsController extends BaseController {
	
	public function __construct() {

		parent::__construct();
	}

	public function managerShow() {

		$listOfUsers = Auth::user()->getStaff()->paginate(10);

		JavaScript::put(array('url' => URL::route('manager.results.get')));

		return View::make('results.managerShow')->with('listOfUsers', $listOfUsers);
	}

	public function managerGet() {

		if (Request::ajax()) {

			$users = Auth::user()->getStaff();

			$allUsers = $users->count();
			$attemptedTest = 0;
			$passedTest = 0;
			foreach ($users->get() as $user) {

				if ($user->tests()->count()) {

					$attemptedTest++;

					if (Result::hasPassed($user)) {

						$passedTest++;
					}
				}
			}
			$activeUsers = $users->where('active', true)->count();

			$response = array('all_users' => $allUsers, 
				'active_users' => $activeUsers, 
				'attempted' => $attemptedTest, 
				'passed' => $passedTest);

			return Response::json($response);
		}
	}

	public function adminShow() {

		$listOfUsers = User::paginate(10);

		JavaScript::put(array('url' => URL::route('admin.results.get')));

		return View::make('results.adminShow')->with('listOfUsers', $listOfUsers);
	}

	public function adminGet() {

		if (Request::ajax()) {

			$users = User::all();

			$allUsers = $users->count();
			$attemptedTest = 0;
			$passedTest = 0;
			foreach ($users as $user) {

				if ($user->tests()->count()) {

					$attemptedTest++;

					if (Result::hasPassed($user)) {

						$passedTest++;
					}
				}
			}
			$activeUsers = User::where('active', true)->count();

			$response = array('all_users' => $allUsers, 
				'active_users' => $activeUsers, 
				'attempted' => $attemptedTest, 
				'passed' => $passedTest);

			return Response::json($response);
		}
	}
}
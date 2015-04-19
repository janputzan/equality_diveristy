<?php

class HomeController extends BaseController {

	public function __construct() {

		parent::__construct();
	}
	public function showLogin()
	{
		return View::make('login');
	}

	public function redirectHome() {

		if (Auth::check()) {
			
			if (Auth::user()->isAdmin()) {

				return Redirect::route('admin.dashboard');
			}
			if (Auth::user()->isManager()) {

				return Redirect::route('manager.dashboard');
			}

			return Redirect::route('user.dashboard');
		}

		return Redirect::route('showLogin');
	}

	public function show404() {

		return View::make('_404');
	}

}

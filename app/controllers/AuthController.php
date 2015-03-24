<?php

class AuthController extends BaseController {

	public function __construct() {

		parent::__construct();
	}
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => true)))
		{
		    if (Auth::user()->isAdmin()) {

		    	return Redirect::route('admin.dashboard')->with('message', 'You are logged in');
		    }
		    if (Auth::user()->isManager()) {

		    	return Redirect::route('manager.dashboard')->with('message', 'You are logged in');
		    }

		    return Redirect::route('user.dashboard')->with('message', 'You are logged in');
		}

		return Redirect::back()->with('message', 'Wrong credentials, try again.');
	}

	public function logout() {

		Auth::logout();

		return Redirect::route('showLogin')->with('message', 'You have logged out');
	}

}

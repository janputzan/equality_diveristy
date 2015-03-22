<?php

class AuthController extends BaseController {

	
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => true)))
		{
		    if (Auth::user()->isAdmin()) {

		    	return Redirect::route('admin.dashboard');
		    }
		    if (Auth::user()->isManager()) {

		    	return Redirect::route('manager.dashboard');
		    }

		    return Redirect::route('dashboard');
		}

		return Redirect::back()->with('message', 'Wrong credentials, try again.');
	}

	public function logout() {

		Auth::logout();

		return Redirect::route('home');
	}

}

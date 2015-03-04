<?php

class AuthController extends BaseController {

	
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
		    if (!Auth::user()->manager_id) {

		    	return Redirect::route('admin.dashboard');
		    }

		    return Redirect::route('dashboard');
		}
	}

	public function logout() {

		Auth::logout();

		return Redirect::route('home');
	}

}

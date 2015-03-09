<?php

class AuthController extends BaseController {

	
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password, 'active' => true)))
		{
		    if (!Auth::user()->manager_id) {

		    	return Redirect::route('admin.dashboard');
		    }

		    return Redirect::route('dashboard');
		}

		return Redirect::back();
	}

	public function logout() {

		Auth::logout();

		return Redirect::route('home');
	}

}

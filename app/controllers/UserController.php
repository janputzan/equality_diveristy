<?php

use Validators\UserValidator;
use Exceptions\ValidationFailedException;

class UserController extends BaseController {

	public function __construct(UserValidator $userValidator)
    {
        $this->userValidator = $userValidator;
    }

	
	public function showDashboard()
	{
		return View::make('user.dashboard');
	}

	public function activate($code) {

		$user = User::whereInvitationCode($code)->first();

		if ($user) {

			return View::make('user.activate')->with('user', $user)->with('code', $code);
		}

		return Redirect::route('home')->with('errorMessage', 'This activation code has expired, contact the Administrator');
	}

	public function storePassword() {

		$user = User::whereInvitationCode(Input::get('activation_code'))->first();

		if ($user) {

			try {

				$this->userValidator->validatePassword(Input::all());

			} catch( ValidationFailedException $e) {

				return Redirect::back()->with('errors', $e->getValidationErrors());
			}

			$user->password = Hash::make(Input::get('password'));
			$user->active = true;
			$user->invitation_code = null;
			$user->save();

			return Redirect::route('home')->with('message', 'You can now log in.');
		}

		return Redirect::back()->with('errorMessage', 'Something went wrong. Please contact the Administrator');
	}

}

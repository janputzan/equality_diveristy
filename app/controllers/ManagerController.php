<?php

use Validators\UserValidator;
use Validators\DepartmentValidator;
use Exceptions\ValidationFailedException;

class ManagerController extends BaseController {

	public function __construct(UserValidator $userValidator, DepartmentValidator $departmentValidator)
    {
    	parent::__construct();
        $this->userValidator = $userValidator;
        $this->departmentValidator = $departmentValidator;
    }

    public function showDashboard() {

		return View::make('manager.dashboard');
	}

	public function showUsers() {

		$users = Auth::user()->getStaff()->paginate(10);

		return View::make('manager.users.index')->with('users', $users);
	}

	public function addUsers() {


		return View::make('manager.users.add');
	}

	public function storeUsers() {

		if (Request::ajax()) {

			$data = Input::all();

			$data['invitation_code'] = str_random(40);

			$user = new User;
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->email = $data['email'];
			$user->manager_id = Auth::user()->id;
			$user->invitation_code = $data['invitation_code'];
			$user->active = false;

			try {

				$this->userValidator->validate($data);

			} catch( ValidationFailedException $e) {

				return Response::json(array('errors' => $e->getValidationErrors()));
			}

			$user->save();

			$data = array(
				'name'	=> $user->first_name,
				'code'	=> $user->invitation_code,
				'department' => Auth::user()->manages()->name
			);

			Mail::send('emails.users', $data, function($message) use ($user)
			{
			  $message->from('no-reply@equality.com', Auth::user()->manages()->name.' manager');
			  $message->to($user->email, $user->first_name)->subject('Welcome to Equality and Diversity');

			});

			return Response::json(array('success' => 'User created'));
			
		}


		return Redirect::route('manager.users.index');

	}
}
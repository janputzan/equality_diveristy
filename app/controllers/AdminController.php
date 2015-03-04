<?php

use Validators\UserValidator;
use Validators\DepartmentValidator;
use Exceptions\ValidationFailedException;

class AdminController extends BaseController {

	public function __construct(UserValidator $userValidator, DepartmentValidator $departmentValidator)
    {
        $this->userValidator = $userValidator;
        $this->departmentValidator = $departmentValidator;
    }

	
	public function showDashboard() {

		return View::make('admin.dashboard');
	}

	public function showUsers() {

		$users = User::paginate(10);

		return View::make('admin.users.index')->with('users', $users);
	}

	public function addUsers() {

		$departments = array();

		foreach (Department::all() as $department) {

			$departments[$department->id] = $department->name;
		}

		return View::make('admin.users.add', compact('departments'));
	}

	public function storeUsers() {

		if (Request::ajax()) {

			$data = Input::all();

			$data['invitation_code'] = str_random(40);

			$user = new User;
			$user->first_name = $data['first_name'];
			$user->last_name = $data['last_name'];
			$user->email = $data['email'];
			$user->manager_id = Department::find($data['department'])->manager()->id;
			$user->invitation_code = $data['invitation_code'];
			$user->active = false;

			try {

				$this->userValidator->validate($data);

			} catch( ValidationFailedException $e) {

				return Response::json(array('errors' => $e->getValidationErrors()));
			}

			$user->save();

			return Response::json(array('success' => 'User created'));
			
		}


		return Redirect::route('admin.users.index');

	}

	public function showDepartments() {

		$departments = Department::paginate(10);

		return View::make('admin.departments.index', compact('departments'));
	}

	public function addDepartments() {

		return View::make('admin.departments.add');
	}

	public function storeDepartments() {

		if (Request::ajax()) {

			$departmentData = Input::only('name', 'info');

			$userData = array();
			$userData = Input::only('first_name', 'last_name', 'email');

			$userData['invitation_code'] = str_random(40);

			try {

				$this->userValidator->validate($userData);
				$this->departmentValidator->validate($departmentData);

				
				$user = new User;
				$user->first_name = $userData['first_name'];
				$user->last_name = $userData['last_name'];
				$user->email = $userData['email'];
				$user->manager_id = Auth::user()->id;
				$user->invitation_code = $userData['invitation_code'];
				$user->active = false;

				$user->save();

				$department = new Department;
				$department->name = $departmentData['name'];
				$department->info = $departmentData['info'];
				$department->manager_id = $user->id;

				$department->save();

			} catch( ValidationFailedException $e) {

				return Response::json(array('errors' => $e->getValidationErrors()));
			}

			return Response::json(array('success' => 'Department created'));
		}

		return Redirect::route('admin.departments.index');


	}

}

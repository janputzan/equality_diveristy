<?php

class AdminController extends BaseController {

	
	public function showDashboard()
	{
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

		$data = Input::all();

		$user = new User;
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email'];
		$user->manager_id = Department::find($data['department'])->manager()->id;

		$user->save();

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

		$data = Input::all();

		$user = new User;
		$user->first_name = $data['first_name'];
		$user->last_name = $data['last_name'];
		$user->email = $data['email'];
		$user->manager_id = Auth::user()->id;

		$user->save();

		$department = new Department;
		$department->name = $data['department_name'];
		$department->info = $data['info'];
		$department->manager_id = $user->id;

		$department->save();

		return Redirect::route('admin.departments.index');


	}

}

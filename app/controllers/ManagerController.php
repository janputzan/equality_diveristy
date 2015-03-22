<?php

use Validators\UserValidator;
use Validators\DepartmentValidator;
use Exceptions\ValidationFailedException;

class ManagerController extends BaseController {

	public function __construct(UserValidator $userValidator, DepartmentValidator $departmentValidator)
    {
        $this->userValidator = $userValidator;
        $this->departmentValidator = $departmentValidator;
    }

    public function showDashboard() {

		return View::make('manager.dashboard');
	}
}
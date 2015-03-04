<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function getRememberToken()
	{
	    return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}

	public function tests() {

		return $this->hasMany('Test');
	}

	public function department() {

		return Department::where('manager_id', '=', $this->manager_id)->first();
	}

	public function manager() {

		return User::find($this->manager_id);
	}

	public function manages() {

		return Department::where('manager_id', '=', $this->id)->first();
	}

	public function isAdmin() {

		if (!$this->manager_id) {

			return true;
		}

		return false;
	}

	public function isManager() {

		if ($this->manager_id == 1) {

			return true;
		}

		return false;
	}

}

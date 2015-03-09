<?php

class Department extends Eloquent {

	public $timestamps = false;

	public function users() {

		return $this->hasMany('User');
	}

	public function manager() {

		return User::find($this->manager_id);
	}

}
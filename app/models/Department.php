<?php

class Department extends Eloquent {

	public $timestams = false;

	public function users() {

		return $this->hasMany('User');
	}

}
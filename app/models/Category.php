<?php

class Category extends Eloquent {

	public $timestams = false;

	public function questions() {

		return $this->hasMany('Question');
	}

}
<?php

class Category extends Eloquent {

	public $timestamps = false;

	public function questions() {

		return $this->hasMany('Question');
	}

}
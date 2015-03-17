<?php

class Characteristic extends Eloquent {

	public $timestamps = false;

	public function questions() {

		return $this->hasMany('Question');
	}

}
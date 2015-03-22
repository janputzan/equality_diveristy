<?php

class MainArea extends Eloquent {

	public $timestamps = false;

	public function questions() {

		return $this->hasMany('Question');
	}

}
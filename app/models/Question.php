<?php

class Question extends Eloquent {

	public $timestamps = false;

	public function characteristic() {

		return $this->belongsTo('Characteristic');
	}

	public function mainArea() {

		return $this->belongsTo('MainArea');
	}

	public function tests() {

		return $this->belongsToMany('Test', 'test_questions');
	}

	public function answers() {

		return $this->hasMany('Answer');
	}

	
}
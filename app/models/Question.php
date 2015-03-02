<?php

class Question extends Eloquent {

	public $timestams = false;

	public function category() {

		return $this->belongsTo('Category');
	}

	public function tests() {

		return $this->belongsToMany('Test', 'test_questions');
	}

	public function answers() {

		return $this->hasMany('Answer');
	}

	
}
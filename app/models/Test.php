<?php

class Test extends Eloquent {

	public $timestams = false;

	public function user() {

		return $this->belongsTo('User');
	}

	public function questions() {

		return $this->belongsToMany('Question', 'test_questions');
	}

	
}
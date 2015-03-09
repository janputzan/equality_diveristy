<?php

class Test extends Eloquent {

	public $timestamps = false;

	public function user() {

		return $this->belongsTo('User');
	}

	public function questions() {

		return $this->belongsToMany('Question', 'test_questions');
	}

	
}
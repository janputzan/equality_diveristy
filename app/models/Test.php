<?php

class Test extends Eloquent {

	public function user() {

		return $this->belongsTo('User');
	}

	public function questions() {

		return $this->belongsToMany('Question')->withPivot('answer_id', 'result')->withTimestamps();
	}

	
}
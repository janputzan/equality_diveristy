<?php

class Answer extends Eloquent {

	public $timestamps = false;

	public function question() {

		return $this->belongsTo('Question');
	}

	public function isRight() {

		return $this->is_right;
	}

}
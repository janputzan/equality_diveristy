<?php

class Answer extends Eloquent {

	public $timestamps = false;

	public function question() {

		return $this->belongsTo('Question');
	}

}
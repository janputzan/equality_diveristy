<?php

class Answer extends Eloquent {

	public $timestams = false;

	public function question() {

		return $this->belongsTo('Question');
	}

}
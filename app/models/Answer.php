<?php

class Answer extends Eloquent {

	public $timestamps = false;

	public function question() {

		return $this->belongsTo('Question');
	}

	public function isRight() {

		if ($this->id == $this->question->right_answer_id) {

			return true;
		}

		return false;
	}

}
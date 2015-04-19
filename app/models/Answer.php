<?php

class Answer extends Eloquent {

	public $timestamps = false;

	protected $fillable = array('id', 'question_id', 'body', 'is_right');

	public function question() {

		return $this->belongsTo('Question');
	}

	public function isRight() {

		return $this->is_right;
	}

}
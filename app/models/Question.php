<?php

class Question extends Eloquent {

	public $timestamps = false;

	protected $fillable = array('id', 'characteristic_id', 'main_area_id', 'body');

	public function characteristic() {

		return $this->belongsTo('Characteristic');
	}

	public function mainArea() {

		return $this->belongsTo('MainArea');
	}

	public function tests() {

		return $this->belongsToMany('Test')->withPivot('answer_id', 'result')->withTimestamps();
	}

	public function answers() {

		return $this->hasMany('Answer');
	}

	public function rightAnswer() {

		return $this->answers()->where('is_right', true)->first();
	}

	
}
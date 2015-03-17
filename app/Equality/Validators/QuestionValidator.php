<?php namespace Validators;

class QuestionValidator extends BaseValidator
{
    
    public function validateQuestion($data) {

    	$rules = array(
    		'body' => 'required|min:10|max:500|unique:questions');

    	return $this->validate($data, $rules);
    }

    public function validateAnswer($data) {

        $rules = array(
            'body' => 'required|min:10|max:500|unique:answers');

        return $this->validate($data, $rules);
    }

    
}
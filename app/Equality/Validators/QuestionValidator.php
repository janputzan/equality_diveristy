<?php namespace Validators;

class QuestionValidator extends BaseValidator
{
    
    public function validateQuestion($data) {

    	$rules = array(
    		'body' => 'required|min:10|max:500|unique:questions');

    	return $this->validate($data, $rules);
    }

    public function validateAnswers($data) {

        $rules = array(
            'answer_1' => 'required|min:10|max:500',
            'answer_2' => 'required|min:10|max:500',
            'answer_3' => 'required|min:10|max:500',
            'answer_4' => 'required|min:10|max:500',
            'right_answer' => 'required'
            );

        return $this->validate($data, $rules);
    }

    
}
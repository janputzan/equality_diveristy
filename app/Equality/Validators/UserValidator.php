<?php namespace Validators;

class UserValidator extends BaseValidator
{
    protected $rules = array(
        'first_name'     => 'required|min:3|max:30',
        'last_name'      => 'required|min:3|max:30',
        'email'          => 'required|email|unique:users',
        'invitation_code' => 'required|unique:users'
    );

    public function validatePassword($data) {

    	$rules = array(
    		'password' => 'required|min:6|max:30|confirmed',
    		'password_confirmation' => 'required');

    	return $this->validate($data, $rules);
    }

    
}
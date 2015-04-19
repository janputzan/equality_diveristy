<?php namespace Validators;

class DepartmentValidator extends BaseValidator
{
    protected $rules = array(
        'name'     => 'required|min:3|max:30',
        'info'      => 'required|min:3|max:255'
    );

    
}
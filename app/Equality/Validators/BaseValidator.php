<?php namespace Validators;

use Illuminate\Support\Facades\Validator;
use Exceptions\ValidationFailedException;

abstract class BaseValidator
{
    public function validate($input, $rules = array())
    {
        $rules = empty($rules) ? $this->rules : $rules;

        $validator = Validator::make((array) $input, $rules);

        if($validator->fails())
        {
            throw new ValidationFailedException($validator->messages());
        }

        return true;
    }
}
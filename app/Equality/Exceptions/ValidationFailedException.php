<?php namespace Exceptions;

use Exception;
use Illuminate\Support\MessageBag;

class ValidationFailedException extends Exception
{
    private $errors;

    public function __construct(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    public function getValidationErrors()
    {
        return $this->errors;
    }    
}
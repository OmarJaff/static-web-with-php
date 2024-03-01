<?php

namespace Core;

class ValidationException extends \Exception
{

    protected $errors = [];

    public static function throw ($errors)
    {


        $instance = new static;

        $instance->errors = $errors;

        throw $instance;

    }
}
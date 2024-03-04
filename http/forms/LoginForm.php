<?php

namespace http\forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct (public array $attributes)
    {
        if(! Validator::email($attributes['email'])) {
            $this->errors['email'] = "Current credentials are incorrect.";
        }

        if(! Validator::string($attributes['password'], 1, 255)) {
            $this->errors['password'] = "Current credentials are incorrect.";
        }
    }

    public static function  validate($attributes): static
    {

        $instance = new static($attributes);

        if($instance->failed()) {

            ValidationException::throw($instance->errors(), $instance->attributes);
        }

        return $instance;
    }

    public function failed (): int
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message): void
    {
        $this->errors[$field] = $message;
    }
}
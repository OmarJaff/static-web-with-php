<?php

namespace http\forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate($email, $password): bool
    {

        if(! Validator::email($email)) {
           $this->errors['email'] = "Current credentials are incorrect.";
        }

        if(! Validator::string($password, 7, 255)) {
            $this->errors['password'] = "Current credentials are incorrect.";
        }

        return empty($this->errors);

    }

    public function errors(): array
    {
        return $this->errors;
    }
}
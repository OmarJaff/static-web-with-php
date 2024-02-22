<?php

namespace Core;


class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {

            $validated = password_verify($password, $user['password']);

            if ($validated) {
                $this->login($email);
                return true;
            }
        }
        return false;

    }

    public function login($email)
    {
        $_SESSION['user'] = [
            'email' => $email,
        ];

        session_regenerate_id(true);

    }

   public function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time()-3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}
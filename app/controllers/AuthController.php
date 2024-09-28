<?php

namespace Controllers;

use Core\Exceptions\ClientException;
use Core\Request;
use Core\View;

class AuthController
{
    public static function login()
    {
        View::render("auth/login");
    }

    public static function doLogin()
    {
        $email = Request::post("email");
        $password = Request::post("password");

        if(empty($email)) {
            throw new ClientException("Input your e-mail.");
        }

        if(empty($password)) {
            throw new ClientException("Input your password.");
        }

        dd($email, $password);
    }
}
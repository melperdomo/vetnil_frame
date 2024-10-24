<?php

namespace App\Controllers;

use Core\Exceptions\ClientException;
use Core\Helper\Request;
use Core\Helper\Response;
use Core\Helper\Session;
use Core\Helper\View;
use App\Models\Acl;
use App\Models\User;

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

        $user = User::findByCredentials($email, $password);
        if(empty($user)) {
            throw new ClientException("User not found");
        }

        $user->acl = Acl::getAclByRole($user->id);
        Session::set("user", $user);
        Response::redirect("/");
    }

    public static function logout()
    {
        session_destroy();
        Response::redirect("/login");
    }
}
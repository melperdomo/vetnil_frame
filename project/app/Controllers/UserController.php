<?php

namespace App\Controllers;

use Core\Helper\Request;
use Core\Helper\Response;
use Core\Helper\View;

class UserController 
{
    public static function register() 
    {
        View::render("user/register");
    }

    public static function doRegister()
    {
        $name = Request::post("name");
        $cpf = Request::post("cpf");
        $store = Request::post("store");
        $email = Request::post("email");
        $tel = Request::post("tel");
        $password = Request::post("password");
        Response::redirect("/");
    }
}
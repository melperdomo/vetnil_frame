<?php

namespace App\Controllers;

use App\Models\Store;
use App\Models\User;
use Core\Helper\Request;
use Core\Helper\Response;
use Core\Helper\View;

class UserController 
{    
    public static function register() 
    {
        $stores = Store::list();
        View::render("user/register", [
            "stores" => $stores,
        ]);
    }

    public static function userRegister()
    {
        $name = Request::post("name");
        $cpf = Request::post("cpf");
        $store = Request::post("id_store");
        $email = Request::post("email");
        $tel = Request::post("tel");
        $password = Request::post("password");
        $senha_criptografada = password_hash($password, PASSWORD_DEFAULT);
        User::doRegister($name, $cpf, $store, $email, $tel, $senha_criptografada);
        Response::redirect("/login");
    }
}
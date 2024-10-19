<?php

namespace Core\Middleware;

use Core\Helper\Request;
use Core\Helper\Response;
use Core\Helper\Session;

class Auth extends Middleware
{
    const array ROUTES = [
        "/",
    ];

    public static function checkUserSession()
    {
        $uri = Request::getUri();
        if(!in_array($uri, static::ROUTES)) return;

        $user = Session::get("user");

        if(empty($user)) {
            Response::redirect("/login");
        }
    }

    public static function checkAcl()
    {
        $uri = Request::getUri();
        if(!in_array($uri, static::ROUTES)) return;
    }
}
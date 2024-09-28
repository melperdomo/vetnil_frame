<?php

namespace Controllers;

use Core\Response;
use Core\Session;
use Core\View;

class HomeController
{
    public static function index()
    {
        $user = Session::get('consumer');

        View::render("home/index", [
            'user' => $user
        ]);
    }
}
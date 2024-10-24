<?php

namespace App\Controllers;

use Core\Helper\Session;
use Core\Helper\View;

class HomeController
{
    public static function index()
    {
        $user = Session::get('user');

        View::render("home/index", [
            'user' => $user
        ]);
    }
}
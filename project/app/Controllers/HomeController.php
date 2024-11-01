<?php

namespace App\Controllers;

use Core\Helper\Paginator;
use Core\Helper\Queue;
use Core\Helper\Session;
use Core\Helper\View;

class HomeController
{
    public static function index()
    {
        $sql = "SELECT * FROM users;";
        $paginator = new Paginator($sql);
        $user = Session::get('user');

        View::render("home/index", [
            'user' => $user,
            'paginator' => $paginator,
        ]);
    }

    public static function rabbitmq()
    {
        Queue::put("bagulho é louco");
    }
}
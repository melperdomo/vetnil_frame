<?php

namespace Controllers;

use Core\View;

class HomeController
{
    public static function index()
    {
        View::render("home/index");
    }
}
<?php

namespace Core\Middleware;

class Middleware
{
    public static function pre()
    {
        Csrf::validate();
        Auth::checkUserSession();
        Auth::checkAcl();
    }

    public static function pos()
    {
        
    }
}
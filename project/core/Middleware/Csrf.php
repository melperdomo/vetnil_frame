<?php

namespace Core\Middleware;

use Core\Helper\Request;
use Core\Helper\Security;

class Csrf extends Middleware
{
    public static function validate()
    {
        $method = Request::getMethod();

        if ($method != 'POST') {
            return;
        }

        Security::csrfValidation();
    }
}
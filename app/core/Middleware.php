<?php

namespace Core;

use Core\Exceptions\SingeloException;

class Middleware
{
    public static function checkUserSession()
    {
        if(empty($user)) {
            Response::redirect("/login");
        }
    }

    public static function run(string $function_name, callable $function_routes)
    {
        if(!method_exists(static::class, $function_name)) {
            throw new SingeloException("The requested middleware function doesn't exist", 1002);
        }

        static::$function_name();
        $function_routes();
    }
}
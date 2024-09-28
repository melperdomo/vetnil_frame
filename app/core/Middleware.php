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

    public static function validateCsrf()
    {
        Security::csrfValidation();
    }

    public static function run(array $function_names, callable $function_routes)
    {
        foreach($function_names as $fn_name) {
            if(!method_exists(static::class, $fn_name)) {
                throw new SingeloException("The requested middleware function doesn't exist", 1002);
            }
    
            static::$fn_name();
        }
        
        $function_routes();
    }
}
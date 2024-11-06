<?php

namespace App\Models;

use Core\Helper\DB;
use Core\Helper\Security;

class User
{
    public static function findByCredentials(string $email, string $password)
    {
        $user = DB::first("SELECT * FROM users WHERE email = ?", [$email]);
        if(empty($user->password)) return null;

        $password_is_valid = Security::verifyPassword($password, $user->password);
        return ($password_is_valid) ? $user : null;
    }
}
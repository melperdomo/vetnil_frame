<?php

namespace Core\Helper;

use Core\Exceptions\NotAllowedException;

class Security
{
    public static function csrfInput()
    {
        $csrf_token = bin2hex(random_bytes(32));
        Session::set("csrf_token", $csrf_token);
        echo "<input type=\"hidden\" name=\"csrf_token\" value=\"$csrf_token\">";
    }

    public static function csrfValidation()
    {
        $_SESSION['global_counter'] += 1;

        if($_SESSION['global_counter'] >= 2) {
            dd($_SERVER);
        }

        $session_csrf_token = Session::get("csrf_token");

        if (empty($session_csrf_token) || !hash_equals($session_csrf_token, $_POST['csrf_token'])) {
            throw new NotAllowedException();
        }

        Session::unset("csrf_token");
    }

    public static function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
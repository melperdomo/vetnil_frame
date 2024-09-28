<?php

namespace Core;

use Core\Exceptions\NotAllowedException;

class Security
{
    public static function csrfInput()
    {
        $csrf_token = bin2hex(random_bytes(32));

        session_start();
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = $csrf_token;
        }

        echo "<input type=\"hidden\" name=\"csrf_token\" value=\"$csrf_token\">";
    }

    public static function csrfValidation()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') return;

        if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            throw new NotAllowedException();
        }

        unset($_SESSION['csrf_token']);
    }
}
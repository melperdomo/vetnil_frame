<?php 

namespace App\Controllers;

use App\Models\User;
use Core\Helper\View;

class UserController {
    public static function list() {
        $users = User::list();
        View::render("user/list", [
            "users" => $users,
        ]);
    }
}
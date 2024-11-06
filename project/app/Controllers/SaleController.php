<?php 

namespace App\Controllers;

use App\Models\Sale;
use Core\Helper\View;

class SaleController {
    public static function list()
    {
        $sales = Sale::list();
        View::render("sales/list", [
            "sales" => $sales,
        ]);
    }
}


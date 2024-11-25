<?php 

namespace App\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Core\Helper\View;

class SaleController {
    public static function list()
    {
        $products = Product::list();
        $sales = Sale::list();
        
        View::render("sales/list", [
            "sales" => $sales,
            "products" => $products,
        ]);
    }
}
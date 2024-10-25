<?php

namespace App\Controllers;

use App\Models\Product;
use Core\Helper\View;

class ProductController {
    public static function list()
    {
        $products = Product::list();
        View::render("products/list", [
            "products" => $products,
        ]);
    }
}

<?php 

namespace App\Models;

use Core\Helper\DB;

class Product
{    
    public static function list()
    {
        $products = DB::query("SELECT * FROM products");
        return $products;
    }
}
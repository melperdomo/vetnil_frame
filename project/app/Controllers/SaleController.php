<?php 

namespace App\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\ScratchOff;
use Core\Helper\Paginator;
use Core\Helper\View;


class SaleController {
    public static function list()
    {
        $luck_numbers = ScratchOff::allLuckNumbers();
        $prize = ScratchOff::sumPrize();
        $products = Product::list();
        $string_sql = Sale::list();

        // dd($string_sql);

        $paginator = Paginator::make($string_sql, itemsPerPage:5);

        View::render("sales/list", [
            "paginator" => $paginator,
            "products" => $products,
            "luck_numbers" => $luck_numbers,
            "prize" => $prize,
        ]);
    }
}
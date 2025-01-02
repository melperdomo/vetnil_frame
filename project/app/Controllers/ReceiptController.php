<?php

namespace App\Controllers;

use App\Models\Receipt;
use App\Models\Product;
use App\Models\Store;
use Core\Helper\Request;
use Core\Helper\Response;
use Core\Helper\View;

class ReceiptController 
{    
    public static function receipt() 
    {
        $stores = Store::list();
        $products = Product::list();
        View::render("receipt/register", [
            "products" => $products,
            "stores" => $stores,
        ]);
    }

    public static function receiptRegister()
    {
        $cnpj = Request::post("cnpj");
        $code = Request::post("code");
        $receipt_date = Request::post("receipt_date");
        $product = Request::post("id_product");
        $value = Request::post("value");
        dd($cnpj, $code, $receipt_date, $product, $value);
        
        Receipt::doRegister($cnpj, $code, $receipt_date, $product, $value);
        Response::redirect("/vendas");
    }
}
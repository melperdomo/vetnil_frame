<?php 

namespace App\Models;

use Core\Helper\DB;
use Core\Helper\Session;

class Receipt 
{
    public static function registerSale(string $code, string $receipt_date, array $products)
    {
        $id_user = Session::get("user")->id;
        
        $id_receipt = DB::query("
            INSERT INTO receipt (code, date, id_user)
            VALUES ('$code', '$receipt_date', '$id_user')
            RETURNING id
        ");
        
        $id_receipt = $id_receipt[0]->id;

        foreach ($products as $product):
            $id_product = $product['id'];
            $value = $product['value'];
            
            DB::query("
            INSERT INTO receipt_product (id_receipt, id_product, value)
            VALUES ('$id_receipt', '$id_product', '$value')
        ");
        endforeach;        
    }
}
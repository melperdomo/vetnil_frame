<?php

namespace App\Models;

use Core\Helper\DB;
use Core\Helper\Request;
use Core\Helper\Session;

class Sale
{
    public static function list()
    {
        $id_product = Request::get('id_product');
        $user = Session::get('user');
        $string_sql =
            "SELECT
                products.name AS \"pname\",
                receipt.date,
                receipt_product.value,
                scratch_off.prize,
                scratch_off.luck_number
            FROM
                receipt
            JOIN
                receipt_product ON receipt_product.id_receipt = receipt.id
            JOIN
                products ON products.id = receipt_product.id_product
            JOIN
                scratch_off ON scratch_off.id_receipt = receipt.id
            WHERE
                receipt.id_user = $user->id
        ";

        if ($id_product != NULL ) {
            $string_sql .= 
            "
                AND receipt_product.id_product = $id_product
            ";
        }

        $sales = DB::query($string_sql);
        return $sales;
    }
}
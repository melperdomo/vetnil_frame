<?php 

namespace App\Models;

use Core\Helper\DB;

class Sale
{
    public static function list()
    {
        $sales = DB::query(
            "SELECT
                products.name AS 'pname',
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
        ");
        return $sales;
    }
}
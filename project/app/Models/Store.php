<?php 

namespace App\Models;

use Core\Helper\DB;

class Store
{
    public static function list()
    {
        $stores = DB::query("SELECT * FROM stores");
        return $stores;
    }
}
<?php 

namespace App\Models;

use Core\Helper\DB;

class ScratchOff
{
    public static function allLuckNumbers()
    {
        $luck_numbers = DB::query("
            SELECT COUNT
                (scratch_off.luck_number) AS luck_number_count
            FROM 
                scratch_off
            JOIN
                receipt ON scratch_off.id_receipt = receipt.id
            WHERE
                receipt.id_user = 1
            GROUP BY
                receipt.id_user
        ");
        
        return $luck_numbers[0]->luck_number_count;
    }

    public static function sumPrize()
    {
        $prize = DB::query("
            SELECT SUM
                (prize) AS total_prizes
            FROM
                public.scratch_off
        ");
        
        return $prize[0]->total_prizes;
    }
       
}
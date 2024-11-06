<?php 

namespace App\Utils;

class Formatter {
    static public function date(string $date) {
        return date('d/m/Y', strtotime($date));
    }
    
    static public function money($value = 0) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
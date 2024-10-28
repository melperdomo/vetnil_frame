<?php 

namespace App\Models;

use Core\Helper\DB;

class Product
{
    private static function corrigirAcentuacao(string $nomeProduto): string {
        $mapearCorrecao = [
            'veterinaria' => 'veterinária',
            'injetavel' => 'injetável',
        ];

        foreach ($mapearCorrecao as $semAcento => $comAcento) {
            $nomeProduto = str_replace($semAcento, $comAcento, $nomeProduto);
        }
        return $nomeProduto;
    }
    
    public static function list()
    {
        $products = DB::query("SELECT * FROM products");
        foreach ($products as &$product) {
            $product->name = self::corrigirAcentuacao($product->name);
        }
        unset($product);
        return $products;
    }
}
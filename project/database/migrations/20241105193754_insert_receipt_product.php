<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO receipt_product (id_receipt, id_product, value) VALUES
            (1, 1, 29.99),
            (1, 2, 15.50),
            (2, 3, 12.00),
            (2, 4, 9.99),
            (3, 1, 29.99),
            (4, 2, 15.50),
            (5, 3, 12.00),
            (6, 4, 9.99),
            (7, 1, 29.99),
            (8, 2, 15.50),
            (9, 3, 12.00),
            (10, 4, 9.99),
            (3, 2, 15.50),
            (4, 1, 29.99),
            (5, 4, 9.99),
            (6, 3, 12.00),
            (7, 4, 9.99),
            (8, 3, 12.00),
            (9, 1, 29.99),
            (10, 2, 15.50);        
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM receipt_products WHERE id_receipt BETWEEN 1 AND 10;
        ");
    }
};
<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS receipt_product (
            id SERIAL PRIMARY KEY,
            id_receipt INT NOT NULL,
            id_product INT NOT NULL,
            value REAL NOT NULL,
            FOREIGN KEY (id_receipt) REFERENCES receipt(id),
            FOREIGN KEY (id_product) REFERENCES products(id)
            );
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS receipt_product;
        ");
    }
};
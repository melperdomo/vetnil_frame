<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS stores (
            id INT PRIMARY KEY,
            name TEXT NOT NULL,
            cnpj TEXT NOT NULL
            );
        ");
    }

    public function down()
    {
        DB::statement("
        DROP TABLE IF EXISTS stores
    ");
    }
};

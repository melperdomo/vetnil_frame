<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS products (
                id SERIAL PRIMARY KEY,
                name TEXT NOT NULL,
                image TEXT
            );
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS products;
        ");
    }
};
<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS receipt (
            id SERIAL PRIMARY KEY,
            code TEXT NOT NULL,
            date DATE NOT NULL,
            id_user INT,
            FOREIGN KEY (id_user) REFERENCES users(id)
            );

        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS receipt;
        ");
    }
}; 

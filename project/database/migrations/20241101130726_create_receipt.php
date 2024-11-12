<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS receipt (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            code TEXT NOT NULL,
            date DATE NOT NULL,
            id_user INTEGER,
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
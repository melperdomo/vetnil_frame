<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS store (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            id_receipt INTEGER NOT NULL,
            date_receipt INTEGER NOT NULL,
            store_name TEXT NOT NULL,
            FOREIGN KEY (id_receipt) REFERENCES receipt(id),
            FOREIGN KEY (date_receipt) REFERENCES receipt(date)
            );
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS store;
        ");
    }
};
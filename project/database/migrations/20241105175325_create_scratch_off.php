<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS scratch_off (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            id_receipt INTEGER NOT NULL,
            prize TEXT,
            luck_number TEXT NOT NULL,
            FOREIGN KEY (id_receipt) REFERENCES receipt(id)
            );
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS scratch_off;
        ");
    }
};
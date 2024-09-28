<?php

use Core\DB;

return new class {

    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY,
                name TEXT,
                email TEXT,
                password TEXT
            );
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS users;");
    }
};
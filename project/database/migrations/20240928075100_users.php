<?php

use Core\Helper\DB;

return new class {

    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY,
                id_role INTEGER NOT NULL DEFAULT 2,
                name TEXT,
                email TEXT,
                password TEXT,
                FOREIGN KEY (id_role) REFERENCES acl_roles(id)
            );
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS users;");
    }
};
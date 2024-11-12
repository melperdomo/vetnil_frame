<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS stores (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            cnpj TEXT NOT NULL
            );
        ");

        DB::statement("
            CREATE TABLE IF NOT EXISTS users2 (
                id INTEGER PRIMARY KEY,
                id_role INTEGER NOT NULL DEFAULT 2,
                id_store INTEGER,
                name TEXT,
                email TEXT,
                password TEXT,
                FOREIGN KEY (id_role) REFERENCES acl_roles(id),
                FOREIGN KEY (id_store) REFERENCES stores(id)
            );
        ");

        DB::statement("
            INSERT INTO users2 (id, id_role, id_store, name, email, password)
            SELECT id, id_role, NULL, name, email, password FROM users; 
        ");

        DB::statement("
            DROP TABLE users;
        ");

        DB::statement("
            ALTER TABLE users2 RENAME TO users;
        ");
    }

    public function down()
    {
        
    }
};
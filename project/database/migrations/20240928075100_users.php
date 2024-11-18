<?php

use Core\Helper\DB;

return new class {

    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS users (
             id SERIAL PRIMARY KEY,
                id_role INT NOT NULL DEFAULT 2,
                id_store INT,
                name TEXT,
                email TEXT,
                password TEXT,
                FOREIGN KEY (id_role) REFERENCES acl_roles(id),
                FOREIGN KEY (id_store) REFERENCES stores(id)
            );
        ");
    }

    public function down()
    {
        DB::statement("DROP TABLE IF EXISTS users;");
    }
};
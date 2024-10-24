<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS acl_roles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                description TEXT,
                active INTEGER NOT NULL DEFAULT 1
            );
        ");

        DB::statement("
            CREATE TABLE IF NOT EXISTS acl_resources (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                path TEXT NOT NULL,
                description TEXT
            );
        ");

        DB::statement("
            CREATE TABLE acl_privileges (
                id_role INTEGER NOT NULL,
                id_resource INTEGER NOT NULL,
                allow INTEGER NOT NULL DEFAULT 1,
                FOREIGN KEY (id_role) REFERENCES acl_roles(id),
                FOREIGN KEY (id_resource) REFERENCES acl_resources(id),
                PRIMARY KEY (id_role, id_resource)
            );
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS acl_privileges;
        ");

        DB::statement("
            DROP TABLE IF EXISTS acl_roles;
        ");

        DB::statement("
            DROP TABLE IF EXISTS acl_resources;
        ");
    }
};
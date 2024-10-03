<?php

use Core\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO acl_roles (id, name, description, active) VALUES
            (1, 'admin', 'Administrator', 1),
            (2, 'default', 'Default', 1);
        ");

        DB::statement("
            INSERT INTO acl_resources (id, path, description) VALUES
            (1, '*', 'Any path');
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM acl_roles WHERE id IN(1,2);
        ");

        DB::statement("
            DELETE FROM acl_resources WHERE id IN(1);
        ");
    }
};
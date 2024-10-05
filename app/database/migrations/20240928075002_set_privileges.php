<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO acl_privileges (id_role, id_resource, allow) VALUES 
            (1, 1, 1), (2, 1, 1);
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM acl_privileges WHERE id_role IN (1,2);
        ");
    }
};
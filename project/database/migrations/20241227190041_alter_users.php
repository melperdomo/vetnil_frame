<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            ALTER TABLE users ADD COLUMN cpf VARCHAR(11) NOT NULL default '00000000000'
        ");
        
        DB::statement("
            ALTER TABLE users ADD COLUMN tel VARCHAR(11) NOT NULL default '00000000000'
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE users DROP COLUMN cpf
        ");

        DB::statement("
            ALTER TABLE users DROP COLUMN tel
        ");
    }
};
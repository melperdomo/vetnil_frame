<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            CREATE TABLE IF NOT EXISTS ...
        ");
    }

    public function down()
    {
        DB::statement("
            DROP TABLE IF EXISTS ...
        ");
    }
};
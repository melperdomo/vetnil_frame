<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            ALTER TABLE scratch_off
            ALTER COLUMN prize TYPE NUMERIC(10,2) USING prize::NUMERIC
        ");
    }

    public function down()
    {
        DB::statement("
            ALTER TABLE scratch_off
            ALTER COLUMN prize TYPE TEXT USING prize::TEXT
        ");
    }
};
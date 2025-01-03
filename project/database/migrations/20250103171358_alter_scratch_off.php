<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            ALTER TABLE scratch_off
            ALTER COLUMN prize TYPE NUMERIC(10,2)
            USING prize::NUMERIC(10,2)
        ");
    }

    public function down()
    {
    
    }
};
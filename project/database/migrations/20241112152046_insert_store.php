<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO stores (id, name, cnpj) VALUES
            (1, 'Cobasi Comércio', '53153938000108'),
            (2, 'Petz Center Comércio', '18328118000109');
        ");

        DB::statement("
            UPDATE users SET id_store = 1 WHERE id = 1;
        ");

        DB::statement("
            UPDATE users SET id_store = 2 WHERE id = 2;
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM stores WHERE id BETWEEN 1 AND 2;
        ");
    }
};
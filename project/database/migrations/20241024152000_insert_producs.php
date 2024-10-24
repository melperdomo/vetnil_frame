<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO products (id, name, image) VALUES
            (1, 'Ampicilina veterinaria injetavel', 'project/public/imagens/ampicilina-veterinaria-injetavel.png'),
            (2, 'Aminomix gold', 'project/public/imagens/aminomix-gold.png'),
            (3, 'Aurivet', 'project/public/imagens/aurivet.png'),
            (4, 'Organew pet po', 'project/public/imagens/organew.png');
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM products WHERE id IN(1,2,3,4);
        ");
    }
};
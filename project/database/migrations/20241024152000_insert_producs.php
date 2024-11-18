<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO products (id, name, image) VALUES
            (1, 'Ampicilina veterinária injetável', '/imagens/ampicilina-veterinaria-injetavel.png'),
            (2, 'Aminomix gold', '/imagens/aminomix-gold.png'),
            (3, 'Aurivet', '/imagens/aurivet.png'),
            (4, 'Organew pet pó', '/imagens/organew.png');
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM products WHERE id IN(1,2,3,4);
        ");
    }
};
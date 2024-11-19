<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            UPDATE products
            SET image = REPLACE(image, '/imagens/', '/images/images-products/')
        ");
    }

    public function down()
    {
        DB::statement("
            UPDATE products
            SET image = REPLACE(image, '/images/images-products/', '/imagens/')
        ");
    }
};
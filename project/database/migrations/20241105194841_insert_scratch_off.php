<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO scratch_off (id_receipt, prize, luck_number) VALUES
            (1, NULL, 123456),
            (2, '50.00', 234567),
            (3, '100.00', 345678),
            (4, '150.00', 456789),
            (5, NULL, 567890),
            (6, '50.00', 678901),
            (7, '100.00', 789012),
            (8, NULL, 890123),
            (9, '150.00', 901234),
            (10, '50.00', 112345);
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM scratch_off WHERE id_receipt BETWEEN 1 AND 10;
        ");
    }
};
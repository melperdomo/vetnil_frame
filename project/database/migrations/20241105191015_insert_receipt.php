<?php

use Core\Helper\DB;

return new class
{
    public function up()
    {
        DB::statement("
            INSERT INTO receipt (code, date, id_user) VALUES 
            ('ABC123456', '2023-01-01', 1),
            ('DEF789012', '2023-01-02', 1),
            ('GHI345678', '2023-01-03', 1),
            ('JKL901234', '2023-01-04', 1),
            ('MNO567890', '2023-01-05', 1),
            ('PQR123456', '2023-01-06', 2),
            ('STU789012', '2023-01-07', 2),
            ('VWX345678', '2023-01-08', 2),
            ('YZA901234', '2023-01-09', 2),
            ('BCD567890', '2023-01-10', 2);
        ");
    }

    public function down()
    {
        DB::statement("
            DELETE FROM receipt WHERE code IN(
            'ABC123456', 
            'DEF789012', 
            'GHI345678', 
            'JKL901234', 
            'MNO567890',
            'PQR123456',
            'STU789012',
            'VWX345678',
            'YZA901234',
            'BCD567890'
            );
        ");
    }
};
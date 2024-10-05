<?php

use Core\Helper\DB;

return new class {

    public function up()
    {
        DB::statement('
            INSERT INTO users (id, id_role, name, email, password) VALUES
            (1, 1, \'Admin User\', \'admin@example.com\', \'$2y$10$czlVnwdJzFDXEMXZe80Za.Xqu3owgmC2fCj7eeQVhbyccwzUi7qrm\'),
            (2, 2, \'Default User\', \'default@example.com\', \'$2y$10$czlVnwdJzFDXEMXZe80Za.Xqu3owgmC2fCj7eeQVhbyccwzUi7qrm\');
        ');
    }

    public function down()
    {
        DB::statement("DELETE FROM users WHERE id = 1;");
    }
};
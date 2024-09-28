<?php

use Core\DB;

return new class {

    public function up()
    {
        DB::statement('
            INSERT INTO users (id, name, email, password) 
            VALUES (1, \'Default User\', \'default@example.com\', \'$2y$10$czlVnwdJzFDXEMXZe80Za.Xqu3owgmC2fCj7eeQVhbyccwzUi7qrm\');
        ');
    }

    public function down()
    {
        DB::statement("DELETE FROM users WHERE id = 1;");
    }
};
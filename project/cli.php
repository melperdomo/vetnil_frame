<?php

include __DIR__ . '/core/bootstrap.php';
use Core\Helper\DB;

connect();

function connect()
{
    $pdo = DB::connect();
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS migrations (
            name TEXT, 
            datetime TEXT
        );
    ");
}

function migrate()
{
    $done_migs = getDBMigrations();
    $file_migs = getFileMigrations();
    $pending_migs = array_diff($file_migs, $done_migs);

    foreach($pending_migs as $mig_name) {
        $mig_path = __DIR__ . "/database/migrations/$mig_name";
        $mig_file_name = basename($mig_path);

        echo $mig_file_name . " migrating\n";
        $class_mig = include_once $mig_path;
        $class_mig->up();
        insertMigrationLog($mig_file_name);
        echo $mig_file_name . " migrated\n";
    }
}

function rollback($limit = 0)
{
    $done_migs = getDBMigrations($limit, 'DESC');
    
    foreach($done_migs as $mig) {
        $mig_path = __DIR__ . "/database/migrations/$mig->name";
        $mig_file_name = basename($mig_path);

        echo $mig_file_name . " rollbacking\n";
        $class_mig = include_once $mig_path;
        $class_mig->down();
        removeMigrationLog($mig_file_name);
        echo $mig_file_name . " rollbacked\n";
    }
}

function up($migration_file_name)
{
    if(!is_string($migration_file_name)) {
        exit("ERROR: Inform the migration file name\n");
    }

    echo "up\n";
}

function down($migration_file_name)
{
    if(!is_string($migration_file_name)) {
        exit("ERROR: Inform the migration file name\n");
    }

    echo "down\n";
}

function create_migration($name)
{
    $dir_path = __DIR__ . "/database/migrations/";
    $model = "$dir_path.migration_model.php";
    $new = $dir_path . date("YmdHis") . "_$name.php";
    copy($model, $new);
    echo "Migration $new created successfully \n";
}

function getDBMigrations($limit = 0, $sorting = 'ASC')
{
    $list = DB::query("
        SELECT name FROM migrations
        ORDER BY datetime $sorting
    ");

    return $list;
}

function getFileMigrations()
{
    $list = [];
    $directory = __DIR__ . "/database/migrations";
    $files = glob($directory . '/*.php');

    foreach ($files as $file) {
        $list[] = basename($file);
    }

    return $list;
}

function insertMigrationLog($mig_file_name)
{
    $now = date('Y-m-d H:i:s');

    DB::statement("
        INSERT INTO migrations (name, datetime) 
        VALUES ('$mig_file_name', '$now');
    ");
}

function removeMigrationLog($mig_file_name)
{
    DB::statement("
        DELETE FROM migrations
        WHERE name = '$mig_file_name';
    ");
}

if (php_sapi_name() == 'cli') {
    
    if (isset($argv[1]) && function_exists($argv[1])) {

        $function = $argv[1];
        $param = !empty($argv[2]) ? $argv[2] : null;
        $function($param);

    } else {
        echo "Function not found or not specified.\n";
    }
}
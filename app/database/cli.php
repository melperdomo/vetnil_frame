<?php

include __DIR__ . '/../core/bootstrap.php';

function migrate()
{
    $done_migs = getDBMigrations();
    $file_migs = getFileMigrations();
    $pending_migs = array_diff($file_migs, $done_migs);

    foreach($pending_migs as $mig_name) {
        $mig_path = __DIR__ . "/migrations/$mig_name";
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
    
    foreach($done_migs as $mig_name) {
        $mig_path = __DIR__ . "/migrations/$mig_name";
        $mig_file_name = basename($mig_path);

        echo $mig_file_name . " rollbacking\n";
        $class_mig = include_once $mig_path;
        $class_mig->down();
        removeMigrationLog($mig_file_name);
        echo $mig_file_name . " rollbacking\n";
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

function connect()
{
    try {
        $db_path = __DIR__ . '/app.db';
        $db = new PDO("sqlite:$db_path");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $db->exec("
            CREATE TABLE IF NOT EXISTS migrations (
                name TEXT, 
                datetime TEXT
            );
        ");

        return $db;
    } catch (PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

function getDBMigrations($limit = 0, $sorting = 'ASC')
{
    $list = [];
    $db = connect();

    $sql = "
        SELECT name FROM migrations
        ORDER BY datetime $sorting
    ";
    if($limit) $sql .= " LIMIT $limit";

    $stmt = $db->query($sql);

    while ($name = $stmt->fetchColumn(0)) {
        $list[] = $name;
    }

    $db = null;
    return $list;
}

function getFileMigrations()
{
    $list = [];
    $directory = __DIR__ . '/migrations';
    $files = glob($directory . '/*.php');

    foreach ($files as $file) {
        $list[] = basename($file);
    }

    return $list;
}

function insertMigrationLog($mig_file_name)
{
    $db = connect();
    $now = date('Y-m-d H:i:s');

    $db->exec("
        INSERT INTO migrations (name, datetime) 
        VALUES ('$mig_file_name', '$now');
    ");

    $db = null;
}

function removeMigrationLog($mig_file_name)
{
    $db = connect();

    $db->exec("
        DELETE FROM migrations WHERE name = '$mig_file_name';
    ");

    $db = null;
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
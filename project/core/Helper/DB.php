<?php

namespace Core\Helper;

use PDO;
use Core\Helper\Env;

class DB
{
    public static function connect(): PDO
    {
        $host = Env::get('DB_HOST');
        $user = Env::get('DB_USER');
        $password = Env::get('DB_PASSWORD');
        $dbname = Env::get('DB_DATABASE');

        $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public static function statement(string $sql): void
    {
        $pdo = static::connect();
        $pdo->exec($sql);
    }

    public static function query(string $sql, array $params = []): array
    {
        $pdo = static::connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function first(string $sql, array $params = [])
    {
        $results = static::query($sql, $params);
        return empty($results[0]) ? null : $results[0];
    }
}
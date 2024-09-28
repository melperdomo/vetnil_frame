<?php

namespace Core;

use PDO;

class DB
{
    const DB_PATH = __DIR__ . '/../database/app.db';

    public static function connect(): PDO
    {
        $db_path = __DIR__ . "/../database/app.db";
        $db = new PDO("sqlite:$db_path");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }

    public static function statement(string $sql): void
    {
        $db = static::connect();
        $db->exec($sql);
        $db = null;
    }

    public static function query(string $sql, array $params = []): array
    {
        $db = static::connect();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $db = null;

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function first(string $sql, array $params = [])
    {
        $results = static::query($sql, $params);
        return empty($results[0]) ? null : $results[0];
    }
}
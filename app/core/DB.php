<?php

namespace Core;

use SQLite3;

class DB
{
    const DB_PATH = __DIR__ . '/../database/app.db';

    public static function connect(): SQLite3
    {
        return new SQLite3(static::DB_PATH);
    }

    public static function statement(string $sql): void
    {
        $db = static::connect();
        $db->exec($sql);
        $db->close();
    }

    public static function query(string $sql): array
    {
        $db = static::connect();
        $result = $db->query($sql);
        return $result->fetchArray(SQLITE3_ASSOC);
    }
}
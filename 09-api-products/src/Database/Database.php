<?php
declare(strict_types=1);

namespace App\Database;

use PDO;

class Database
{
    private const string DB_PATH = __DIR__ . '/../../database.sqlite';

    /**
     * Validates if the SQLite database file exists.
     * Only creates the file and schema the very first time (when the file is missing).
     */
    public static function init(): void{
        if (file_exists(self::DB_PATH)) {
            return;
        }

        $pdo = self::getConnection();

        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS products (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                category TEXT NOT NULL,
                price REAL NOT NULL
            );
            SQL;

        $pdo->exec($sql);
    }

    /**
     * Returns the PDO connection to execute queries.
     */
    public static function getConnection(): PDO{
        return new PDO('sqlite:' . self::DB_PATH, null, null, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
}

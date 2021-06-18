<?php
class DB
{
    static private PDO $pdo;
    public static function getPDO(): PDO {
        if (!isset(self::$pdo)) {
            try {
                $dsn = sprintf("mysql:dbname=%s;host=%s", DB_NAME, DB_HOST);
                self::$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
                self::$pdo->exec("set names utf8");
            } catch (PDOException $e) {
                die('Falló la conexión: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

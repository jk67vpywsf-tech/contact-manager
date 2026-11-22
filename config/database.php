<?php
class Database {
    public static function connect() {
        $dsn = "mysql:host=localhost;dbname=contact_manager;charset=utf8mb4";
        return new PDO($dsn, "root", "", [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
}
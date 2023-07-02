<?php
class Db {
    private static $db = null;
    private PDO $conn;
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pass = 'pass';
    private string $dbname = 'thenet';

    private function __construct() {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => FALSE
        ];
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4", $this->user, $this->pass,$options);
    }

    private function __clone()
    {

    }

    public static function getInstance(): Db
    {
        if (!self::$db) {
            self::$db = new self();
        }
        return self::$db;
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }

    public function query($query): void
    {
        $this->conn->query($query);
    }

    public function read($query): array
    {
        $res = $this->conn->query($query);
        $data = [];
        while ($row = $res->fetch()) {
            $data[] = $row;
        }
        return $data;
    }
}

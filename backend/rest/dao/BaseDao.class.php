<?php
require_once __DIR__ . '/../config.php';

class BaseDao {
    protected $conn;
    private $table;

    public function __construct($table) {
        $this->table = $table;
        try {
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            throw $e;
        }
    }

    protected function query_unique($query, $params) {
        $results = $this->query($query, $params);
        return reset($results);
    }

    protected function query($query, $params) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
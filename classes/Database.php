<?php
class Database {
    private $conn;

    public function connect() {
        $config = require __DIR__ . '/../config/config.php';

        $this->conn = null;
        try {
            $dsn = "mysql:host=" . $config['db_host'] . ";dbname=" . $config['db_name'];
            $this->conn = new PDO($dsn, $config['db_user'], $config['db_password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>

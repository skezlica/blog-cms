<?php

class Database {
    private static $instance;
    private $connection;

    private function __construct() {
        $this->connect();
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function connect() {
        $string = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
        try {
            $this->connection = new PDO($string, DBUSER, DBPASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($query, $data = []) {
        $stmt = $this->connection->prepare($query);

        $check = $stmt->execute($data);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }
}
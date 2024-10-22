<?php
// Model.php
namespace core;
use PDO;
use PDOException;
class Model {
    public $db;

    public function __construct() {
        $this->db = $this->getDB();
    }

    // Functie voor database connectie
    public function getDB() {
        try {
            $dsn = 'mysql:host=localhost;dbname=your_database;charset=utf8';
            $pdo = new PDO($dsn, 'username', 'password');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}

?>
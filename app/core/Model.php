<?php
// Model.php
namespace core;
use PDO;
use PDOException;
class Model
{

    protected $db;

    // Constructor to set up the database connection
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=profileapp;charset=utf8';
        $username = 'root';
        $password = 'root';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        try {
            $this->db = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    // Function to get the database connection instance
    public function getDB()
    {
        return $this->db;
    }
}

?>
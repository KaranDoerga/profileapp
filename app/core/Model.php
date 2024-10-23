<?php
// Model.php
namespace core;
use PDO;
use PDOException;
class Model {

    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $dbname = "profileapp";

    //PDO Objects
    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
        //Set DSN
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            // Optioneel: Echo voor debuggen
            echo "Database connection successful!";
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            // Optioneel: Echo foutmelding
            echo "Database connection failed: " . $this->error;
            $this->dbh = null; // Zorg ervoor dat $dbh null is als het niet lukt
        }
    }

    // Prepare statement with query
    // Prepare statement with query
    public function query($sql) {
        if ($this->dbh) {
            $this->stmt = $this->dbh->prepare($sql);
        } else {
            echo("Database connection not initialized!");
        }
    }

    // Bind values, to prepared statement using named parameters
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute() {
        return $this->stmt->execute();
    }

    // Return multiple records
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Return a single record
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}

?>
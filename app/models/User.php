<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Functie om een gebruiker aan te maken
    public function createUser($first_name, $last_name, $email, $password, $profile_image = null) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Bouw query dynamisch op afhankelijk van of er een profielafbeelding is
        if ($profile_image) {
            $sql = "INSERT INTO Users (first_name, last_name, email, password, profile_image) VALUES (?, ?, ?, ?, ?)";
            $params = [$first_name, $last_name, $email, $hashedPassword, $profile_image];
        } else {
            $sql = "INSERT INTO Users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
            $params = [$first_name, $last_name, $email, $hashedPassword];
        }

        // Voer de query uit met de juiste parameters
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($params);
        } catch (PDOException $e) {
            // Foutafhandeling, bijv. loggen van fout
            echo "Error: " . $e->getMessage();
        }
    }

    public function getUserById($id) {
        $sql = "select * from Users where id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserByEmail($email) {
        $sql = "select * from Users where email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

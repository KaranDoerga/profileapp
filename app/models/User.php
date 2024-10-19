<?php

class User {
    private $db;

    public function __construct($db) {
        $this->db = connectDB();
    }

    // Functie om een gebruiker aan te maken
    public function createUser($first_name, $last_name, $email, $password, $profile_image = null) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "insert into Users (first_name, last_name, email, password, profile_image) values (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email, $hashedPassword, $profile_image]);
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

<?php

namespace models;

use core\Model;

class User extends Model {

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":email" => $email]);
        $user = $stmt->fetch();
    }

    // Fetch user details based on email
//$sql = "SELECT * FROM users WHERE email = :email";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([':email' => $email]);
//$user = $stmt->fetch();



    // Registreren van een nieuwe gebruiker
    public function register($first_name, $last_name, $email, $password) {
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
        $stmt = $this->db->prepare($sql);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }
}
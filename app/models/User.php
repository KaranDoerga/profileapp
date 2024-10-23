<?php

namespace models;

use core\Model;

require_once '../core/Model.php';

class User {

    private $db;

    public function __construct() {
        $this->db = new Model();
    }

    //Find user by email address
    public function findByEmail($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    // Register user
    public function register($data) {
        $this->db->query("INSERT INTO users (first_name, last_name, email, password) 
        VALUES (:first_name, :last_name, :email, :password)");

        // Bind values
        $this->db->bind(":first_name", $data['first_name']);
        $this->db->bind(":last_name", $data['last_name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":password", $data['password']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($email, $password) {
        $row = $this->findByEmail($email);

        if ($row == false) return false;

        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}
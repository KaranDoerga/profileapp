<?php

namespace models;

use core\Model;

require_once '../core/Model.php';
class Project {
    private $db;

    public function __construct() {
        $this->db = new Model();
    }

    public function createProject($data) {
        $this->db->query("INSERT INTO projecten (user_id, title, beschrijving, category) 
        VALUES (:user_id, :title, :beschrijving, :category)");

        // Bind values
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':beschrijving', $data['beschrijving']);
        $this->db->bind(':category', $data['category']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getProjects() {
        $this->db->query("SELECT * FROM projecten");

        $row = $this->db->resultSet();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
}

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
        $this->db->query("INSERT INTO Projecten (users_id, title, beschrijving, link_image, pro_lang) 
        VALUES (:users_id, :title, :beschrijving, :link_image, :pro_lang)");

        // Bind values
        $this->db->bind(':users_id', $data['users_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':beschrijving', $data['beschrijving']);
        $this->db->bind(':link_image', $data['link_image']);
        $this->db->bind(':pro_lang', $data['pro_lang']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getProjects() {
        $this->db->query("SELECT * FROM Projecten");

        $row = $this->db->resultSet();

        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

//    public function getProjectByUser($user_id) {
//        $sql = "SELECT * FROM Projecten WHERE user_id = ?";
//        $stmt = $this->db->prepare($sql);
//        $stmt->execute([$user_id]);
//        return $stmt->fetchAll(PDO::FETCH_ASSOC);
//    }
//
//    public function getProjectById($id) {
//        $sql = "SELECT * FROM Projecten WHERE id = ?";
//        $stmt = $this->db->prepare($sql);
//        $stmt->execute([$id]);
//        return $stmt->fetch(PDO::FETCH_ASSOC);
//    }
}

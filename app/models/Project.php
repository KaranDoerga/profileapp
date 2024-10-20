<?php

class Project {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createProject($user_id, $title, $description, $link_image, $pro_lang) {
        $sql = "INSERT INTO Projecten (user_id, title, description, link_image, pro_lang) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id, $title, $description, $link_image, $pro_lang]);
    }

    public function getProjectByUser($user_id) {
        $sql = "SELECT * FROM Projecten WHERE user_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProjectById($id) {
        $sql = "SELECT * FROM Projecten WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

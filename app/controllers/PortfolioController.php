<?php

namespace controllers;

use models\Project;

require_once "../models/Project.php";
require_once "../helpers/helper.php";

class PortfolioController{

    private $projectModel;

    public function __construct(){
        $this->projectModel = new Project();
    }

    public function getProjects(){
        $projects = $this->projectModel->getProjects();

        return include_once "../views/portfolio.php";
    }

    public function addProject() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        if (!empty($_FILES["link_image"]["name"])) {
            $target_dir = "public/images/";
            $target_file = $target_dir . basename($_FILES["link_image"]["name"]);
            move_uploaded_file($_FILES["link_image"]["tmp_name"], $target_file);
            $imagePath = $target_file;
        } else {
            $imagePath = "public/images/no-image.jpg";
        }

        $data = [
            'user_id' => $_SESSION['user_id'],
            'title' => trim($_POST['title']),
            'beschrijving' => trim($_POST['beschrijving']),
            'link_image' => $imagePath,
            'pro_lang' => trim($_POST['pro_lang']),
        ];

        // Validate inputs
        if (empty($data['title']) || empty($data['beschrijving']) || empty($data['link_image'])) {
            alert("portfolio", "Vul alle velden in!");
            redirect("../views/portfolio.php");
        }

        // Post Project
        if ($this->projectModel->createProject($data)) {
            redirect("../views/portfolio.php");
        } else {
            die("Er is iets fout gegaan!");
        }
    }
}

$init = new PortfolioController();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['type'] == 'project') {
    $init->addProject();
} else {
    $init->getProjects();
}

?>

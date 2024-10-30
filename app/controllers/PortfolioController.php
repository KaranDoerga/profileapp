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
        require_once "../views/portfolio.php";
    }

    public function addProject() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'users_id' => trim($_SESSION['users_id']),
            'title' => trim($_POST['title']),
            'beschrijving' => trim($_POST['beschrijving']),
            'link_image' => trim($_POST['link_image']),
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $init->addProject();
} else {
    $init->getProjects();
}

?>

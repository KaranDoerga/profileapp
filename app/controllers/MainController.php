<?php

require_once '../models/User.php';
require_once '../models/Project.php';

class MainController {
    public function home() {
        require_once "../views/home.php";
    }

    public function portfolio() {
        $projectModel = new Project();
        $userId = 1; // Hier zou je normaal gesproken de ingelogde gebruiker ophalen
        $projects = $projectModel -> getProjectByUser($userId);

        if (!$projects) {
            $projects = [];
        }

        require_once "../views/portfolio.php";
    }

    public function about() {
        require_once "../views/about.php";
    }

    public function contact() {
        require_once "../views/contact.php";
    }

    public function login() {
        require_once "../views/auth.php";
    }

    public function createProject() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $projectModel = new Project();
            $userId = 1; // De ingelogde gebruiker (dummy ID voor nu)

            // Verwerk het formulier
            $title = $_POST["title"];
            $description = $_POST["description"];
            $pro_lang = $_POST["pro_lang"];
            $link_image = $_FILES["link_image"]["name"];

            move_uploaded_file($_FILES["link_image"]["tmp_name"], "../public/img/" . $link_image);

            $projectModel->createProject($userId, $title, $description, $pro_lang, $link_image);

            header('Location: /portfolio.php');
        }

    }
}

?>

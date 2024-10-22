<?php

use core\Controller;

class PortfolioController extends Controller{

    public function createProject() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $projectModel = new Project(connectDB());
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

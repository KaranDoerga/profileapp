<?php

require_once '../models/User.php';
require_once '../models/Project.php';

// Controleer of het pad bestaat voordat je het require_once uitvoert
$filePath = __DIR__ . '/../models/User.php';
if (!file_exists($filePath)) {
    die("File not found: " . $filePath);  // Toon het volledige pad voor debuggen
}

require_once $filePath;
require_once __DIR__ . '/../models/Project.php';
class Controller {

    public function home() {
        require_once __DIR__ . "/../views/home.php";
    }

    public function portfolio() {
        require_once __DIR__ . "/../views/portfolio.php";
    }

    public function about() {
        require_once __DIR__ . "/../views/about.php";
    }

    public function contact() {
        require_once __DIR__ . "/../views/contact.php";
    }

    public function auth() {
        require_once __DIR__ . "/../views/auth.php";
    }




}

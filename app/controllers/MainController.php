<?php

class MainController {
    public function home() {
        require_once "../views/home.php";
    }

    public function portfolio() {
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
}

?>

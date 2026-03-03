<?php

namespace controllers;

class PageController {

    public function home() {
        require_once __DIR__ . '/../views/home.php';
    }

    public function about() {
        require_once __DIR__ . '/../views/about.php';
    }

    public function contact() {
        require_once __DIR__ . '/../views/contact.php';
    }

    public function portfolio() {
        require_once __DIR__ . '/../views/portfolio.php';
    }

    public function login() {
        require_once __DIR__ . '/../views/login.php';
    }

    public function register() {
        require_once __DIR__ . '/../views/register.php';
    }
}

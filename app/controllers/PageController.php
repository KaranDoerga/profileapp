<?php

namespace controllers;

class PageController {

    public function home() {
        require_once 'app/views/home.php';
    }

    public function about() {
        require_once 'app/views/about.php';
    }

    public function contact() {
        require_once 'app/views/contact.php';
    }

    public function portfolio() {
        require_once 'app/views/portfolio.php';
    }

    public function login() {
        require_once 'app/views/login.php';
    }

    public function register() {
        require_once 'app/views/register.php';
    }
}

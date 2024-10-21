<?php

class Router {

    public function route() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;

        switch ($url) {
            case 'login':
                $controller = new AuthController();
                $controller->login();
                break;
            case 'register':
                $controller = new AuthController();
                $controller->register();
                break;
            case 'logout':
                $controller = new AuthController();
                $controller->logout();
                break;
            default:
                require_once 'app/views/home.php';
        }
    }
}
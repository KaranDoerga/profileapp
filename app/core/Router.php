<?php
// core/Router.php

namespace core;

use controllers\LoginController;
use controllers\RegisterController;

class Router {
    public function route() {
        // Simpel voorbeeld van routering
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

        // Stel controller en actie in op basis van de URL
        switch ($url) {
            case 'login':
                $controller = new LoginController();
                $controller->login();
                break;

            case 'register':
                $controller = new RegisterController();
                $controller->register();
                break;

            // Voeg meer routes toe zoals nodig

            default:
                // Fallback als de route niet bestaat, bijvoorbeeld homepage
                echo "Page not found";
                break;
        }
    }
}
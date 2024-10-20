<?php

require_once 'Controller.php';
require_once '../controllers/AuthController.php'; // Voeg de AuthController toe aan de router

class Router {
    public static function route($url) {
        // Controleer het type request: GET of POST
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET') {
            switch ($url) {
                case '':
                case 'home':
                    (new Controller)->home();
                    break;
                case 'portfolio':
                    (new Controller)->portfolio();
                    break;
                case 'about':
                    (new Controller)->about();
                    break;
                case 'contact':
                    (new Controller)->contact();
                    break;
                case 'auth':
                    (new Controller)->auth();
                    break;
                default:
                    echo "404 page not found";
                    break;
            }
        } elseif ($method == 'POST') {
            // Verwerk POST-verzoeken zoals login of registratie
            switch ($url) {
                case 'login':  // Bij login POST-verzoek
                    (new AuthController)->login();
                    break;
                case 'register':  // Bij registratie POST-verzoek
                    (new AuthController)->register();
                    break;
                case 'logout':  // Bij logout POST-verzoek
                    (new AuthController)->logout();
                    break;
                default:
                    echo "404 page not found";
                    break;
            }
        }
    }
}

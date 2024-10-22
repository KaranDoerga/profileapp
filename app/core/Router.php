<?php

namespace core;

class Router {
    private $routes = [];

    // Voeg routes toe
    public function add($url, $action) {
        $this->routes[$url] = $action;
    }

    // Verwerk de route
    public function route() {
        $requestedUrl = $_SERVER['REQUEST_URI'];

        // Controleer of de gevraagde URL bestaat in de routes
        if (isset($this->routes[$requestedUrl])) {
            // Splits de controller en de actie
            $action = explode('@', $this->routes[$requestedUrl]);
            $controller = $action[0];
            $method = $action[1];

            // Include de controller en roep de methode aan
            require_once '../app/controllers/' . $controller . '.php';
            $controllerInstance = new $controller();
            $controllerInstance->$method();
        } else {
            echo "404 - Pagina niet gevonden";
        }
    }
}
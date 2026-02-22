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
        $requestedUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Controleer of de gevraagde URL bestaat in de routes
        if (isset($this->routes[$requestedUrl])) {
            // Splits de controller en de actie
            $action = explode('@', $this->routes[$requestedUrl]);
            $controller = $action[0];
            $method = $action[1];

            // Include de controller en roep de methode aan
            require_once 'app/controllers/' . $controller . '.php';

            // Add namespace prefix for controllers
            $controllerClass = 'controllers\\' . $controller;
            $controllerInstance = new $controllerClass();
            $controllerInstance->$method();
        } else {
            echo "404 - Pagina niet gevonden";
        }
    }
}
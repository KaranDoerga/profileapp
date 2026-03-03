<?php

use core\Router;

require_once 'app/core/Router.php';

$router = new Router();

// Define routes for pages
$router->add('/', 'PageController@home');
$router->add('/home', 'PageController@home');
$router->add('/about', 'PageController@about');
$router->add('/contact', 'PageController@contact');
$router->add('/portfolio', 'PageController@portfolio');
$router->add('/login', 'PageController@login');
$router->add('/register', 'PageController@register');

// Start de routing
$router->route();
<?php

use core\Router;

require_once 'app/core/Router.php'; // Of het juiste pad naar je router

$router = new Router();

// Start de routing
$router->route();
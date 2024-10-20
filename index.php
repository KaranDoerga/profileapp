<?php

require_once 'app/core/Router.php';

// Haal de URL op uit de query string, bijvoorbeeld /login
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';

// Roep de router aan om de juiste controller te laden
Router::route($url);
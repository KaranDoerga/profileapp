<?php

require_once '../app/core/Router.php';
require_once '../app/controllers/MainController.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'home';

switch ($url) {
    case 'home':
        (new MainController) ->home();
        break;
    case 'portfolio':
        (new MainController) ->portfolio();
        break;
    case 'about':
        (new MainController) ->about();
        break;
    case 'contact':
        (new MainController) ->contact();
        break;
    case 'login':
        (new MainController) ->login();
        break;
    default:
        echo '404 Page Not Found!';
        break;
}

?>

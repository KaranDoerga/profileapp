<?php

class Router {
    public static function route($url) {
        switch ($url) {
            case '':
            case 'home':
                (new MainController) -> home();
                break;
            case 'portfolio':
                (new MainController) -> portfolio();
                break;
            case 'about':
                (new MainController) -> about();
                break;
            case 'contact':
                (new MainController) -> contact();
                break;
            case 'login':
                (new MainController) -> login();
                break;
            default;
                echo "404 page not found";
        }
    }
}

?>
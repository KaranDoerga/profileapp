<?php

require_once '../core/Controller.php';

class AuthController extends Controller{

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Zoek de gebruiker op basis van email
            $userModel = new User(connectDB());
            $user = $userModel->getUserByEmail($email);

            // Als de gebruiker bestaat en het wachtwoord klopt
            if ($user && password_verify($password, $user['password'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];

                // Redirect naar de homepage
                header('Location: home.php');
                exit();
            } else {
                // Toon een foutmelding
                $error = 'Ongeldige e-mail of wachtwoord';
                require_once '../views/auth.php';
            }
        } else {
            // Als het geen POST-verzoek is, toon het loginformulier
            require_once '../views/auth.php';
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Maak een nieuwe gebruiker aan via het User-model
            $userModel = new User(connectDB());
            $existingUser = $userModel->getUserByEmail($email);

            if ($existingUser) {
                $error = 'E-mail is al in gebruik';
                require_once '../views/auth.php';
                return;
            }

            $userModel ->createUser($first_name, $last_name, $email, $password);

            // Redirect naar de login-pagina na succesvolle registratie
            header('Location: auth.php');
            exit();
        } else {
            require_once '../views/auth.php';
        }
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: home.php');
        exit();
    }

}

?>

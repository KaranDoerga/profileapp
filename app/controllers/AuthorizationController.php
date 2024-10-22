<?php

namespace App\Http\Controllers;
use core\Controller;

class AuthorizationController extends Controller {

    //Login functie
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = $this->model('User');
            if ($userModel->login($email, $password)) {
                header('Location: /views/home.php');
            } else {
                $data['error'] = 'Ongeldige inloggegevens';
                $this->view('auth', $data);
            }
        }
    }

    // Registratie functie
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = $this->model('User');
            if ($userModel->register($first_name, $last_name, $email, $password)) {
                header('Location: /views/auth.php');
            } else {
                $data['error'] = 'Registratie mislukt. Probeer het opnieuw.';
                $this->view('auth', $data);
            }
        }
    }

    // Logout functie
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /views/home.php');
    }
}
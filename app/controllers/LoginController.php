<?php
// login.php

namespace controllers;

require '../core/Model.php';
require '../core/Controller.php';

use core\Controller;
use models\User;

class LoginController extends Controller{

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Maak een instantie van de User class
            $userModel = new User();

            // Gebruik de login-functie van de User class
            $user = $userModel->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];

                header('Location: /dashboard.php');
                exit();
            } else {
                $data['error'] = 'Invalid email or password!';
                $this->view('auth', $data);
            }
        } else {
            $this->view('auth');
        }
    }
}
?>
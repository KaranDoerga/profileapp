<?php

namespace controllers;

use models\User;

require_once '../models/User.php';
require_once '../helpers/helper.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'first_name' => trim($_POST['first_name']),
            'last_name' => trim($_POST['last_name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        ];

        // Validate if inputs are empty
        if (empty($data['first_name']) || empty($data['last_name']) ||
            empty($data['email']) || empty($data['password'])) {
            alert("register", "Vul alle gegevens in!");
            redirect("../views/register.php");
        }

        // Validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            alert("register", "Ongeldige e-mailadres!");
            redirect("../views/register.php");
        }

        if ($this->userModel->findByEmail($data['email'])) {
            alert("register", "E-mail adres bestaat al!");
            redirect("../views/register.php");
        }

        // Passed all validation checks
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register user
        if ($this->userModel->register($data)) {
            redirect("../views/login.php");
        } else {
            die("Er is iets fout gegaan!");
        }

    }

    public function login() {
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'email' => trim($POST['email']),
            'password' => trim($POST['password'])
        ];

        // Validate if inputs are empty
        if (empty($data['email']) || empty($data['password'])) {
            alert("login", "Vul email en wachtwoord in");
            header("location: ../views/login.php");
            exit;
        }

        // Check for email
        echo "Checking for email...<br>";
        if($this->userModel->findByEmail($data['email'])) {
            echo "User found, attempting login...<br>";
            // User found
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser) {
                echo "Login succesful, creating session...<br>";
                // Create session
                $this->createUserSession($loggedInUser);
                redirect("../views/home.php");
            } else {
                echo "Incorrect password.<br>";
                alert("login", "Wachtwoord onjuist!");
                redirect("../views/login.php");
            }
        } else {
            echo "No user found.<br>";
            alert("login", "Geen gebruiker gevonden!");
            redirect("../views/login.php");
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['email'] = $user->email;

        echo "Session created with user_id: " . $_SESSION['user_id'] . "<br>";
        redirect("../views/home.php");
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['first_name']);
        unset($_SESSION['email']);
        session_destroy();
        redirect("../views/home.php");
    }
}

$init = new UserController();

// Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("../views/home.php");
    }
} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("../views/home.php");
    }
}
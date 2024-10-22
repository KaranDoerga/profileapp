<?php
// login.php
require '../core/Model.php';

use core\Model;

// Create an instance of the Model class
$model = new Model();
$pdo = $model->getDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user details based on email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, start a session
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];

        echo "Login successful!";
        // Redirect to a protected page (optional)
        header("Location: /dashboard.php");
    } else {
        $error = "Invalid email or password!";
    }
}
?>
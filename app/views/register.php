<?php
    session_start();
//    var_dump($_SESSION);

    include_once '../helpers/helper.php';

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<header>
    <img src="/public/images/images.png" alt="Logo" class="logo">
    <div class="hamburger" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <nav>
        <ul>
            <li><a href="../views/home.php" id="home">Home</a></li>
            <li><a href="../views/portfolio.php" id="portfolio">Portfolio's</a></li>
            <li><a href="../views/about.php" id="about">About</a></li>
            <li><a href="../views/contact.php" id="contact">Contact</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="../controllers/UserController.php?q=logout">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" id="login">Login</a></li>
                <li><a href="../views/register.php" id="register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <?php alert('register') ?>
    <div class="container">
        <!-- Register Sectie -->
        <section id="register-section">
            <h2>Registreren</h2>
            <form action="../controllers/UserController.php" method="post">
                <input type="hidden" name="type" value="register"/>
                <label for="first_name">Voornaam:</label>
                <input type="text" name="first_name" id="first_name" required>

                <label for="last_name">Achternaam:</label>
                <input type="text" name="last_name" id="last_name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="register" class="btn">Registreren</button>
            </form>
        </section>
    </div>

</main>

<footer>
    <ul class="footer-list">
        <li>© 2024 Karan Doerga</li>
    </ul>
</footer>

<script src="/public/js/script.js"></script>

</body>
</html>
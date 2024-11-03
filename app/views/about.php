<?php
session_start();
?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
</head>
<body>

<header>
    <img src="/public/images/images.png" alt="Logo" class="logo">
    <nav>
        <ul>
            <li><a href="../views/home.php" id="home">Home</a></li>
            <li><a href="../views/portfolio.php" id="portfolio">Portfolio's</a></li>
            <li><a href="../views/about.php" id="about">About</a></li>
            <li><a href="../views/contact.php" id="contact">Contact</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="#" id="profile" class="profile-btn">Mijn Profiel</a></li>
                <li><a href="../controllers/UserController.php?q=logout">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" id="login">Login</a></li>
                <li><a href="../views/register.php" id="register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>

</main>

<footer>
    <ul class="footer-list">
        <li>© 2024 Karan Doerga</li>
        <li>Windesheim</li>
        <li>Student: s1217356</li>
    </ul>
</footer>

</body>
</html>
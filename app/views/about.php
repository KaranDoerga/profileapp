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
                <li><a href="../controllers/UserController.php?q=logout">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php" id="login">Login</a></li>
                <li><a href="../views/register.php" id="register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<h1 id="index-text">Welkom, <?php if(isset($_SESSION['user_id'])){
        echo explode(" ", $_SESSION['first_name'])[0];
    }else{
        echo 'Bezoeker';
    }
    ?> </h1>

<main>
    <div class="about-content-container">
        <img src="/public/images/1701482117810.jfif" alt="profile picture" id="profile-picture">
        <div class="about-content">
            <p id="head-text">Hallo, ik ben
            <strong>Karan Doerga</strong>
            </p>
            <p id="content-text">
                Ik ben een enthousiaste webontwikkelaar met een passie voor het creëren van gebruiksvriendelijke en visueel aantrekkelijke websites.
                Momenteel studeer ik aan de Hogeschool Windesheim in Almere en ben bezig met de opleiding Software Development AD.
                De doel van deze website is om portfolio's te kunnen zien van verschillende mensen, waar je dan mogelijk mee kan connecten als er een interesse zit.
            </p>
            <a href="https://www.linkedin.com/in/karan-doerga/">LinkedIn</a>
            & <a href="https://github.com/KaranDoerga">Github</a>
        </div>

    </div>

</main>

<footer>
    <ul class="footer-list">
        <li>© 2024 Karan Doerga</li>
    </ul>
</footer>

</body>
</html>
<?php
session_start();
//var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="/public/css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a href="login.php" id="login">Login</a></li>
                <li><a href="../views/register.php" id="register">Register</a></li>
            <?php else: ?>
                <li><a href="../controllers/UserController.php?q=logout">Logout</a></li>
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
    <h1>Welkom op mijn website!</h1>
    <section class="skills">
        <h2>Mijn Vaardigheden</h2>
        <ul>
            <li>Webontwikkeling (HTML, CSS, JavaScript)</li>
            <li>PHP en MySQL</li>
            <li>OOP</li>
        </ul>
    </section>

    <section class="call-to-action-create">
        <h2>Plaats jouw eigen portfolio!</h2>
        <p>Wil jij jouw portfolio delen met de buiten wereld? Plaats dan jouw portfolio via de <a href="../views/portfolio.php">portfoliopagina</a>.</p>
        <a href="../views/portfolio.php" class="btn">Ga naar portfolio</a>
    </section>

    <section class="call-to-action-contact">
        <h2>Neem contact op!</h2>
        <p>Ben je geïnteresseerd in een samenwerking of heb je vragen? Neem contact met me op via de <a href="../views/contact.php">contactpagina</a>.</p>
        <a href="../views/contact.php" class="btn">Contacteer Mij</a>
    </section>

</main>

<footer>
    <ul class="footer-list">
        <li>© 2024 Karan Doerga</li>
    </ul>
</footer>
</body>
</html>
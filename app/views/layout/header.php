<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="/public/js/script.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

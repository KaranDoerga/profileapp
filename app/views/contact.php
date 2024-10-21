<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>

<header>
    <img src="/public/images/images.png" alt="Logo" class="logo">
    <nav>
        <ul>
            <li><a href="../views/home.php" id="home">Home</a></li>
            <li><a href="../views/portfolio.php" id="portfolio">Portfolio's</a></li>
            <li><a href="../views/about.php" id="about">About</a></li>
            <li><a href="../views/auth.php" id="login">Login</a></li>
            <li><a href="../views/contact.php" id="contact">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <div class="contact-container">
        <section id="contact-section">
            <h2>Contact</h2>
            <form action="/index.php?url=contact" method="post">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" placeholder="Naam" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" cols="5"></textarea>

                <button type="submit" name="contact" class="btn">Verzenden</button>
            </form>
        </section>
    </div>
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
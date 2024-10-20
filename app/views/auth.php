<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/auth.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
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
                <li><form method="post" action="auth.php"><button type="submit" name="logout" class="logout-btn">Logout</button></form></li>
            <?php else: ?>
            <li><a href="../views/auth.php" id="login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <div class="auth-container">
        <!-- Login Sectie -->
        <section id="login-section">
            <h2>Inloggen</h2>
            <form action="/index.php?url=login" method="post">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="login" class="btn">Inloggen</button>

                <?php if (isset($error)): ?>
                    <p class="error-message"><?= $error ?></p>
                <?php endif; ?>
            </form>
        </section>

        <section id="register-section">
            <h2>Registreren</h2>
            <form action="/index.php?url=register" method="post">
                <label for="first_name">Voornaam:</label>
                <input type="text" name="first_name" id="first_name" required>

                <label for="last_name">Achternaam:</label>
                <input type="text" name="last_name" id="last_name" required>

                <label for="email">E-mail:</label>
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
        <li>Windesheim</li>
        <li>Student: s1217356</li>
    </ul>
</footer>

</body>
</html>
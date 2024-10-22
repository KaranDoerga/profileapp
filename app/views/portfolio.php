<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/portfolio.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
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
                <li><form method="post" action="login.php"><button type="submit" name="logout" class="logout-btn">Logout</button></form></li>
            <?php else: ?>
                <li><a href="login.php" id="login">Login</a></li>
                <li><a href="../views/register.php" id="register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <section>
        <h1>Portfolio's</h1>

        <!--Lijst van projecten-->
        <div class="project-list">
            <?php if (!empty($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <div class='project-item'>
                        <img src='<?= $project['link_image']; ?>' alt='<?= $project['title']; ?>'>
                        <h3><?= $project['title']; ?></h3>
                        <p><?= $project['beschrijving']; ?></p>
                        <p>Programmeertaal: <?= $project['pro_lang']; ?></p>
                        <button class='view-details-btn' data-project-id='<?= $project['id']; ?>'>Bekijk Details</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Geen projecten gevonden.</p>
            <?php endif; ?>
        </div>
    </section>

    <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Knop om een nieuw project toe te voegen -->
    <button id="open-add-project-modal" class="btn">Project Toevoegen</button>
    <?php else: ?>
    <p>Je moet ingelogd zijn om een project aan te kunnen maken</p>
    <?php endif; ?>

    <!--Modal voor het aanmaken van een project-->
    <div id="add-project-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-add-project">&times;</span>
            <h2>Nieuw project aanmaken</h2>
            <form id="add-project-form" action="../controllers/PortfolioController.php" method="post" enctype="multipart/form-data">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Beschrijving</label>
                <textarea id="description" name="description" required></textarea>

                <label for="pro_lang">Programmeertalen</label>
                <input type="text" id="pro_lang" name="pro_lang" required>

                <label for="image">Afbeelding uploaden</label>
                <input type="file" id="image" name="image">

                <button class="btn" type="submit">Project aanmaken</button>
            </form>
        </div>
    </div>

    <!--Modal voor het laten zien van de project details-->
    <div id="project-detail-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-project-detail">&times;</span>
            <h2 id="modal-title">Project Titel</h2>
            <p id="modal-description">Project beschrijving...</p>
            <p id="modal-pro_lang">Programmeertalen</p>
            <img id="modal-image" src="" alt="Project Afbeelding">
        </div>
    </div>
</main>

<footer>
    <ul class="footer-list">
        <li>© 2024 Karan Doerga</li>
        <li>Windesheim</li>
        <li>Student: s1217356</li>
    </ul>
</footer>

<!-- Link naar extern JavaScript-bestand -->
<script src="/public/js/script.js"></script>
<script id="project-data" type="application/json"><?php echo json_encode($projects); ?></script>


</body>
</html>
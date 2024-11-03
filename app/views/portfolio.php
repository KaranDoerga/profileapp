<?php
session_start();

use controllers\PortfolioController;

require_once "../controllers/PortfolioController.php";
$init = new PortfolioController();
$projects = $init->getProjects(); // Haal projecten op in view

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
    <div id="add-project-container">
    <?php if (isset($_SESSION['user_id'])): ?>
    <!-- Knop om een nieuw project toe te voegen -->
    <button id="open-add-project-modal" class="btn">Project Toevoegen</button>
    <?php else: ?>
    <p id="add-project-text">Je moet ingelogd zijn om een project aan te kunnen maken</p>
        <a href="../views/login.php" class="btn">Inloggen</a>
    <?php endif; ?>
    </div>

    <!--Modal voor het aanmaken van een project-->
    <div id="add-project-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-add-project">&times;</span>
            <h2>Nieuw project aanmaken</h2>
            <form id="add-project-form" action="../controllers/PortfolioController.php" method="post">
                <input type="hidden" name="type" value="project">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" required>

                <label for="beschrijving">Beschrijving</label>
                <textarea id="beschrijving" name="beschrijving" required></textarea>

                <label for="pro_lang">Programmeertalen</label>
                <select name="pro_lang" id="pro_lang" required>
                    <option value="python">Python</option>
                    <option value="javascript">Javascript</option>
                    <option value="java">Java</option>
                    <option value="c#">C#</option>
                    <option value="ruby">Ruby</option>
                    <option value="php">PHP</option>
                    <option value="c++">C++</option>
                    <option value="go">Go</option>
                </select>

                <label for="image">Afbeelding uploaden</label>
                <input type="file" id="image" name="link_image">

                <button class="btn" type="submit">Project aanmaken</button>
            </form>
        </div>
    </div>

    <!-- Lijst met alle projecten-->
    <?php if (isset($projects) && is_array($projects)): ?>
    <div class="project-container">
        <?php foreach ($projects as $project): ?>
        <div class="project-details">
            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
            <img src="/<?php echo htmlspecialchars($project['link_image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>" class="project-image">
            <p><?php echo htmlspecialchars($project['beschrijving']); ?></p>
            <button class="btn view-details" data-id="<?php echo $project['id']; ?>">Bekijk details</button>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <p>Er zijn nog geen projecten toegevoegd.</p>
    <?php endif; ?>

    <!-- Modal voor projectdetails -->
    <div id="project-modal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="close-modal">&times;</span>
            <h2 id="modal-title"></h2>
            <img id="modal-image" src="" alt="Project Image" class="modal-image">
            <p id="modal-description"></p>
            <p><strong>Programmeertaal:</strong> <span id="modal-language"></span></p>
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
<script id="project-data" type="application/json"><?php echo json_encode($projects); ?></script>
<script src="/public/js/script.js"></script>


</body>
</html>
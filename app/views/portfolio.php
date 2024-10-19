<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/public/css/style.css">
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
            <li><a href="../views/auth.php" id="login">Login</a></li>
            <li><a href="../views/contact.php" id="contact">Contact</a></li>
        </ul>
    </nav>
</header>

<main>
    <section>
        <h1>Portfolio's</h1>

        <!--Lijst van projecten-->
        <div class="project-list">
            <?php
            //Voorbeeld van projectoinformatie
            $projects = [
                1 => ['title' => 'Project 1', 'description' => 'Dit is een kort overzicht van Project 1.', 'image' => '/public/images/project1.jpg'],
                2 => ['title' => 'Project 2', 'description' => 'Dit is een kort overzicht van Project 2.', 'image' => '/public/images/project2.jpg']
            ];

            foreach ($projects as $id => $project) {
                echo "
                <div class='project-item'>
                    <img src='{$project['image']}' alt='{$project['title']}'>
                    <h3>{$project['title']}</h3>
                    <p>{$project['description']}</p>
                    <button class='view-details-btn' data-project-id='$id'>Bekijk Details</button>
                </div>";
            }
            ?>
        </div>
    </section>

    <!-- Knop om een nieuw project toe te voegen -->
    <button id="open-add-project-modal" class="btn">Project Toevoegen</button>

    <!--Modal voor het aanmaken van een project-->
    <div id="add-project-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-add-project">&times;</span>
            <h2>Nieuw project aanmaken</h2>
            <form id="add-project-form" action="/project" method="post" enctype="multipart/form-data">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Beschrijving</label>
                <textarea id="description" name="description" required></textarea>

                <label for="experiences">Ervaringen</label>
                <input type="text" id="experiences" name="experiences" required>

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
            <p id="modal-experiences">Ervaringen</p>
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
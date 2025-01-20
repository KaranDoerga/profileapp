<?php
session_start();

use controllers\PortfolioController;

require_once "../controllers/PortfolioController.php";
$init = new PortfolioController();
$projects = $init->getProjects(); // Haal projecten op in view

require '../views/layout/header.php'
?>

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
        <div class="modal-content" id="add-project-modal-content">
            <span class="close" id="close-add-project">&times;</span>
            <h2>Nieuw project aanmaken</h2>
            <form id="add-project-form" action="../controllers/PortfolioController.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type" value="project">
                <label for="title">Titel</label>
                <input type="text" id="title" name="title" required>

                <label for="beschrijving">Beschrijving</label>
                <textarea id="beschrijving" name="beschrijving" required></textarea>

                <label for="category">Sector</label>
                <select name="category" id="category" required>
                    <option value=""></option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Financiën">Financiën</option>
                    <option value="HR">HR</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Gezondheidszorg">Gezondheidszorg</option>
                    <option value="Onderwijs">Onderwijs</option>
                    <option value="Bouw">Bouw</option>
                    <option value="Consultancy">Consultancy</option>
                    <option value="Juridisch">Juridisch</option>
                    <option value="Verkoop">Verkoop</option>
                    <option value="Creatief">Creatief</option>
                    <option value="Logistiek">Logistiek</option>
                    <option value="Horeca">Horeca</option>
                    <option value="Productie">Productie</option>
                    <option value="Onderzoek">Onderzoek</option>
                    <option value="Publieke Sector">Publieke Sector</option>
                    <option value="Vastgoed">Vastgoed</option>
                    <option value="Klantenservice">Klantenservice</option>
                    <option value="Detailhandel">Detailhandel</option>
                </select>
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
        <div class="modal-content" id="project-modal-content">
            <span class="close" id="close-modal">&times;</span>
            <h2 id="modal-title"></h2>
            <p id="modal-description"></p>
            <p><strong>Sector:</strong> <span id="modal-language"></span></p>
        </div>
    </div>
</main>

<script id="project-data" type="application/json"><?php echo json_encode($projects); ?></script>

<?php
require '../views/layout/footer.php'
?>
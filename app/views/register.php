<?php
    session_start();

    include_once '../helpers/helper.php';

    require '../views/layout/header.php'

?>

<main>
    <?php alert('register') ?>
    <div class="container">
        <!-- Register Sectie -->
        <section id="register-section">
            <h2>Registreren</h2>
            <form action="../controllers/UserController.php" method="post">
                <input type="hidden" name="type" value="register"/>
                <label for="first_name">Voornaam:</label>
                <input type="text" name="first_name" id="first_name" required>

                <label for="last_name">Achternaam:</label>
                <input type="text" name="last_name" id="last_name" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="register" class="btn">Registreren</button>
            </form>
        </section>
    </div>

</main>

<?php
require '../views/layout/footer.php'
?>
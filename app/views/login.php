<?php
session_start();
//var_dump($_SESSION);

include_once '../helpers/helper.php';

require '../views/layout/header.php'
?>

<main>
    <?php alert('login') ?>
    <div class="container">
        <!-- Login Sectie -->
        <section id="login-section">
            <h2>Inloggen</h2>
            <form action="../controllers/UserController.php" method="post">
                <input type="hidden" name="type" value="login">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" name="login" class="btn">Inloggen</button>
            </form>
        </section>
    </div>
    <a href="../views/register.php">Heb je nog geen account? Registreer je.</a>
</main>

<?php
require '../views/layout/footer.php'
?>
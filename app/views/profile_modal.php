<div id="profile-modal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-profile-modal">&times;</span>
        <h2>Mijn Profiel</h2>
        <form method="post" action="login.php">
            <label for="first_name">Voornaam</label>
            <input type="text" id="first_name" name="first_name" value="<?= $_SESSION['first_name']; ?>" required>

            <label for="last_name">Achternaam</label>
            <input type="text" id="last_name" name="last_name" value="<?= $_SESSION['last_name']; ?>" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" value="<?= $_SESSION['email']; ?>" required>

            <button type="submit" class="btn">Profiel bijwerken</button>
        </form>
    </div>
</div>
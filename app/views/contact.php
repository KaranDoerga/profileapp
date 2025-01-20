<?php
session_start();

require '../views/layout/header.php'
?>


<main>
    <div class="container">
        <section id="contact-section">
            <h2>Contact</h2>
            <form action="../controllers/ContactController.php" method="post">
                <label for="name">Volledige naam:</label>
                <input type="text" id="name" name="name" placeholder="Volledige naam" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>

                <label for="subject">Onderwerp:</label>
                <input type="text" id="subject" name="subject" placeholder="Onderwerp" required>

                <label for="message">Bericht:</label>
                <textarea id="message" name="message" placeholder="Bericht" rows="4" cols="5"></textarea>

                <button type="submit" name="submit" class="btn">Verzenden</button>
            </form>
        </section>
    </div>
</main>

<?php
require '../views/layout/footer.php'
?>
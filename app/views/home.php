<?php
session_start();

require __DIR__ . '/layout/header.php';
?>


<main>
    <h1>Welkom op mijn website!</h1>
    <section class="skills">
        <h2>Mijn Vaardigheden</h2>
        <ul>
            <li>Webontwikkeling (HTML, CSS, JavaScript)</li>
            <li>PHP en MySQL</li>
            <li>OOP</li>
        </ul>
    </section>

    <section class="call-to-action-create">
        <h2>Plaats jouw eigen portfolio!</h2>
        <p>Wil jij jouw portfolio delen met de buiten wereld? Plaats dan jouw portfolio via de <a href="/portfolio">portfoliopagina</a>.</p>
        <a href="/portfolio" class="btn">Ga naar portfolio</a>
    </section>

    <section class="call-to-action-contact">
        <h2>Neem contact op!</h2>
        <p>Ben je geïnteresseerd in een samenwerking of heb je vragen? Neem contact met me op via de <a href="/contact">contactpagina</a>.</p>
        <a href="/contact" class="btn">Contacteer Mij</a>
    </section>

</main>

<?php
require __DIR__ . '/layout/footer.php';
?>
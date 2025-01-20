<?php
session_start();

require '../views/layout/header.php'
?>

<main>
    <div class="about-content-container">
        <img src="/public/images/1701482117810.jfif" alt="profile picture" id="profile-picture">
        <div class="about-content">
            <p id="head-text">Hallo, ik ben
            <strong>Karan Doerga</strong>
            </p>
            <p id="content-text">
                Ik ben een enthousiaste webontwikkelaar met een passie voor het creëren van gebruiksvriendelijke en visueel aantrekkelijke websites.
                Momenteel studeer ik aan de Hogeschool Windesheim in Almere en ben bezig met de opleiding Software Development AD.
                De doel van deze website is om portfolio's te kunnen zien van verschillende mensen, waar je dan mogelijk mee kan connecten als er een interesse zit.
            </p>
            <a href="https://www.linkedin.com/in/karan-doerga/">LinkedIn</a>
            & <a href="https://github.com/KaranDoerga">Github</a>
        </div>

    </div>

</main>

<?php
require '../views/layout/footer.php'
?>
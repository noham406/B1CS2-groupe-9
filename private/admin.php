<?php
$title = 'Admin';
$titre = 'Gestion de la base de données';
include '../includes/top_form.php';
?>
    <main>
        <section class="enregistrer">
            <h2>Enregistrer des données</h2>
            <a href="gp.php">Grand Prix</a>
            <a href="ecuries.php">Ecurie</a>
            <a href="pilotes.php">Pilote</a>
            <a href="resultats.php">Resultats Grand Prix</a>
            <a href="resultats_sprint.php">Resultats Sprint</a>
        </section>
        <section class="consulter">
            <h2>Consulter, modifier des données</h2>
            <a href="affichage_gp.php">Grand Prix</a>
            <a href="affichage_ecuries.php">Ecuries</a>
            <a href="affichage_pilotes.php">Pilotes</a>
            <a href="affichage_res_gp.php">Résultats Grand Prix</a>
            <a href="affichage_res_sprint.php">Résultats Sprint</a>
        </section>
        <section id="admin">
            <h2>Classement Dynamique</h2>
            <a href="classement.php">Classement Dynamique</a>
        </section>
    </main>
<?php include '../includes/bottom_form.php';


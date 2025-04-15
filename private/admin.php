<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style_admin.css">
</head>
<body>
    <header>
        <h1>Gestion de la base de données</h1>
    </header>
    <nav>
        <a href="../index.php">Accueil</a>
        <a href="admin.php">Accueil Admin</a>
    </nav>
    <main>
        <section class="enregistrer">
            <h2>Enregistrer des données</h2>
            <a href="gp.php">GP</a>
            <a href="ecuries.php">Ecuries</a>
            <a href="pilotes.php">Pilotes</a>
            <a href="resultats.php">Resultats</a>
            <a href="resultats_sprint.php">Resultats Sprint</a>
        </section>
        <section class="consulter">
            <h2>Consulter, modifier des données</h2>
            <a href="affichage_gp.php">Grand Prix</a>
            <a href="affichage_ecuries.php">Ecuries</a>
            <a href="affichage_pilotes.php">Pilotes</a>
            <a href="affichage_res_gp.php">Résultats Grand Prix</a>
            <!-- Afficher les résultats des courses sprint, et mettre le classement dynamique autre part, peut être en dessous -->
            <a href="classement.php">Classement Dynamique</a>
        </section>
    </main>
</body>
</html>



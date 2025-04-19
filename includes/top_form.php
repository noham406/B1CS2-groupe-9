<?php
define('BASE', '/projet_s2/');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>
        <?php
            if(isset($title)){
                echo $title;
            } else {
                echo "Gestion DB";
            }
        ?>
    </title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE ?>css/style_admin.css">
    <link rel="stylesheet" href="<?= BASE ?>css/mobile.css">
</head>
<body>
    <header id="header_admin">
        <h1>
            <?php
                if(isset($titre)){
                    echo $titre;
                } else {
                    echo "Gestion de la Base de données";
                }
            ?>
        </h1>
    </header>
    <nav id="nav_admin">
        <a href="<?= BASE ?>">Accueil</a>
        <a href="<?= BASE ?>private/admin.php">Accueil Admin</a>
    </nav>

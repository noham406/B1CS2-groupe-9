<?php

if(isset($_POST['nom']) && !empty($_POST['nom'])){
    $nom = htmlspecialchars($_POST['nom']);

    include '../includes/db.php';

    $sql = "INSERT INTO ecuries(nom) VALUES ('$nom')";

    if ($connexion->query($sql)){
        header('Location:affichage_ecuries.php');
    }
} else {
    header('Location:affichage_ecuries.php');
}
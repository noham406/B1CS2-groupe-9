<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $nom = htmlspecialchars($_POST['nom']);
    $circuit = htmlspecialchars($_POST['circuit']);
    $date = htmlspecialchars($_POST['date']);
    $sprint = htmlspecialchars($_POST['sprint']);
    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE grands_prix SET nom='$nom', circuit='$circuit', date='$date', sprint='$sprint' WHERE id='$id'";

    if ($connexion->query($sql)) {
        header('Location:affichage_gp.php');
    }
} else {
    header('Location:affichage_gp.php');
}
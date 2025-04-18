<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $nom = htmlspecialchars($_POST['nom']);
    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE ecuries SET nom='$nom' WHERE id='$id'";

    if ($connexion->query($sql)) {
        header('Location:affichage_ecuries.php');
    }
} else {
    header('Location:affichage_ecuries.php');
}
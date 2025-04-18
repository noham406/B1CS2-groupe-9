<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $nom = htmlspecialchars($_POST['nom']);
    $ecurie_id = htmlspecialchars($_POST['ecurie_id']);
    $id = htmlspecialchars($_POST['id']);

    $sql = "UPDATE pilotes SET nom='$nom', ecurie_id='$ecurie_id' WHERE id='$id'";

    if ($connexion->query($sql)) {
        header('Location:affichage_pilotes.php');
    }
} else {
    header('Location:affichage_pilotes.php');
}
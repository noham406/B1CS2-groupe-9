<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $id = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM pilotes WHERE id='$id'";

    if ($connexion->query($sql)) {
        header('Location:affichage_pilotes.php');
    }
} else {
    header('Location:affichage_pilotes.php');
}
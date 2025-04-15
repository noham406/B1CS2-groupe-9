<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $id = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM ecuries WHERE id='$id'";

    if ($connexion->query($sql)) {
        header('Location:affichage_ecuries.php');
    }
} else {
    header('Location:affichage_ecuries.php');
}
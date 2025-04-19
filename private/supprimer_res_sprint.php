<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $gpid = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM resultats_sprint WHERE grand_prix_id='$gpid'";

    if ($connexion->query($sql)) {
        header('Location:affichage_res_sprint.php');
    }
} else {
    header('Location:affichage_res_sprint.php');
}
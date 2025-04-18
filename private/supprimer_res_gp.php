<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    include '../includes/db.php';

    $gpid = htmlspecialchars($_POST['id']);

    $sql = "DELETE FROM resultats WHERE grand_prix_id='$gpid'";

    if ($connexion->query($sql)) {
        header('Location:affichage_res_gp.php');
    }
} else {
    header('Location:affichage_res_gp.php');
}
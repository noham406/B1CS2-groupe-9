<?php
if (
    isset($_POST['gpid']) && !empty($_POST['gpid']) &&
    isset($_POST['pilote1']) && !empty($_POST['pilote1'])
) {
    include '../includes/db.php';

    $gpid = htmlspecialchars($_POST['gpid']);

    for ($i = 1; $i <= 20; $i++) {
        if (isset($_POST["pilote$i"]) && isset($_POST["points"][$i]) && isset($_POST["position"][$i])) {
            $pilote_id = htmlspecialchars($_POST["pilote$i"]);
            $position = htmlspecialchars($_POST["position"][$i]);
            $points = htmlspecialchars($_POST["points"][$i]);

            $sql = "UPDATE resultats_sprint
                    SET pilote_id = '$pilote_id',
                        points = '$points'
                    WHERE grand_prix_id = '$gpid' AND position = '$position'";

            $connexion->query($sql);
        }
    }

    header('Location:affichage_res_sprint.php');
} else {
    header('Location:affichage_res_sprint.php');
}
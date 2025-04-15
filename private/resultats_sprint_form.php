<?php

if (
    isset($_POST['grand_prix']) && !empty($_POST['grand_prix']) &&
    isset($_POST['pilote1']) && !empty($_POST['pilote1'])
) {
    include '../includes/db.php';

    $grand_prix_id = $_POST['grand_prix'];

    for ($i = 1; $i <= 20; $i++) {
        if (isset($_POST["pilote$i"]) && isset($_POST["sprint_points"][$i])) {
            $pilote_id = $_POST["pilote$i"];
            $position = $_POST["position"][$i];
            $points = $_POST["sprint_points"][$i];

            $sql = "INSERT INTO resultats_sprint (grand_prix_id, pilote_id, position, points) 
                    VALUES ('$grand_prix_id', '$pilote_id', '$position', '$points')";

            $connexion->query($sql);
        }
    }
    header('Location:affichage_res_sprint.php');
} else {
    header('Location:affichage_res_sprint.php');
}

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

            if ($connexion->query($sql)) {
                echo "Ligne $i insérée<br>";
            } else {
                echo "Ligne $i non insérée<br>";
            }
        }
    }

    echo '<strong>Enregistrement terminé.</strong>';
} else {
    echo '<strong>Formulaire incomplet.</strong>';
}

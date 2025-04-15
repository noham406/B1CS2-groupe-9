<?php
if (
    isset($_POST['grand_prix']) && !empty($_POST['grand_prix']) &&
    isset($_POST['pilote1']) && !empty($_POST['pilote1'])
) {
    include '../includes/db.php';

    $grand_prix_id = $_POST['grand_prix'];

    for ($i = 1; $i <= 20; $i++) {
        if (isset($_POST["pilote$i"]) && isset($_POST["points"][$i])) {
            $pilote_id = $_POST["pilote$i"];
            $position = $_POST["position"][$i];
            $points = $_POST["points"][$i];
            $tour_le_plus_rapide = isset($_POST['fastest_lap']) && $_POST['fastest_lap'] == $position ? 1 : 0;

            $sql = "INSERT INTO resultats (grand_prix_id, pilote_id, position, tour_le_plus_rapide, points) 
                    VALUES ('$grand_prix_id', '$pilote_id', '$position', '$tour_le_plus_rapide', '$points')";

            if ($connexion->query($sql)) {
                echo "Ligne $i insérée<br>";
            } else {
                echo "Ligne $i non insérée<br>";
            }
        }
    }
    echo '<strong>Enregistrement terminé</strong><br><a href="resultats.php">Enregistrer encore</a>';
} else {
    echo '<strong>Formulaire incomplet</strong>';
}
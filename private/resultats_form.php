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

            $connexion->query($sql);
        }
    } 
        header('Location:affichage_res_gp.php');
} else {
    header('Location:affichage_res_gp.php');
}
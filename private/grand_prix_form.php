<?php

if(
    isset($_POST['nom']) && !empty($_POST['nom'])
    &&
    isset($_POST['circuit']) && !empty($_POST['circuit'])
    &&
    isset($_POST['date']) && !empty($_POST['date'])
    &&
    isset($_POST['sprint'])
){
    $nom = htmlspecialchars($_POST['nom']);
    $circuit = htmlspecialchars($_POST['circuit']);
    $date = htmlspecialchars($_POST['date']);
    $sprint = htmlspecialchars($_POST['sprint']);

    include '../includes/db.php';

    $sql = "INSERT INTO grands_prix(nom, circuit, date, sprint) VALUES ('$nom', '$circuit', '$date', '$sprint')";

    if($connexion->query($sql)){
        header('Location:affichage_gp.php');
    }
} else {
    header('Location:affichage_gp.php');
}
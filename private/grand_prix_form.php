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
        echo "Réussi";
        echo "<a href='gp.php'>Voir les Grands Prix</a>";
    } else {
        echo "Erreur lors de l'insertion dans la base de données.";
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}

<?php

if(
    isset($_POST['nom']) && !empty($_POST['nom'])
    &&
    isset($_POST['ecurie']) && !empty($_POST['ecurie'])
){
    $nom = htmlspecialchars($_POST['nom']);
    $ecurie = htmlspecialchars($_POST['ecurie']); // id de l'écurie

    include '../includes/db.php';

    $sql = "INSERT INTO pilotes (nom, ecurie_id) VALUES ('$nom', '$ecurie')";

    if($connexion->query($sql)){
        echo "Réussi";
        echo "<a href='pilotes.php'>Pilotes</a>";
    }
} else {
    echo "Miskin";
}

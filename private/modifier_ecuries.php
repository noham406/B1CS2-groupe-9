<?php
$title = 'Modifier Ecurie';
$titre = 'Modifier une écurie';
include '../includes/top_form.php';
include '../includes/db.php';
?>

<div class="formulaire">
    <form action="update_ecurie" method="post">
        <?php
            $id = htmlspecialchars($_POST['id']);
            $sql = "SELECT * FROM ecuries WHERE id='$id'";
            $reponse = $connexion->query($sql);
            foreach ($reponse as $rep):
        ?>
        <label for="nom">Nom de l'Écurie :</label>
        <input type="text" name="nom" required value="<?= $rep['nom'] ?>">
        
        <input type="hidden" name="id" value="<?=$rep['id']?>">
        <button type="submit">Modifier Écurie</button>
        <?php endforeach ?>
    </form>
</div>
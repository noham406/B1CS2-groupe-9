<?php
$title = 'Modifier GP';
$titre = 'Modifier un Grand Prix';
include '../includes/top_form.php';
include '../includes/db.php';
?>

<div class="formulaire">
    <form method="POST" action="update_gp.php">
        <?php
            $id = htmlspecialchars($_POST['id']);
            $sql = "SELECT * FROM grands_prix WHERE id='$id'";
            $reponse = $connexion->query($sql);
            foreach ($reponse as $rep):
        ?>
        <label for="nom">Nom du Grand Prix :</label>
        <input type="text" name="nom" required value="<?= $rep['nom'] ?>">
        
        <label for="circuit">Nom du Circuit :</label>
        <input type="text" name="circuit" required value="<?= $rep['circuit'] ?>">
        
        <label for="date">Date :</label>
        <input type="date" name="date" required value="<?= $rep['date'] ?>">
        
        <label for="sprint">Sprint :</label>
        <select name="sprint" required>
            <option value="0">Non</option>
            <option value="1" <?php if($rep['sprint']==1){echo "selected";}?>>Oui</option>
        </select>

        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
        <button type="submit">Modifier les informations</button>
        <?php endforeach ?>
    </form>
</div>
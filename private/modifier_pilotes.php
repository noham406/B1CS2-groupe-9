<?php
$title = 'Modifier Pilote';
$titre = 'Modifier un Pilote';
include '../includes/top_form.php';
include '../includes/db.php';

$ecuries = $connexion->query("SELECT id, nom FROM ecuries ORDER BY nom ASC");
?>

<div class="formulaire">
    <form method="POST" action="update_pilotes.php">
        <?php
            $id = htmlspecialchars($_POST['id']);
            $sql = "SELECT * FROM pilotes WHERE id='$id'";
            $reponse = $connexion->query($sql);
            foreach ($reponse as $rep):
        ?>
        <label for="nom">Nom du Pilote :</label>
        <input type="text" name="nom" required value="<?= $rep['nom'] ?>">

        <label for="ecurie_id">Écurie :</label>
        <select name="ecurie_id" required>
            <option disabled value="">Sélectionnez l'Écurie</option>
            <?php foreach ($ecuries as $ecurie): ?>
                <option value="<?= $ecurie['id']; ?>" <?= ($ecurie['id'] == $rep['ecurie_id']) ? 'selected' : '' ?>>
                    <?= $ecurie['nom']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
        <button type="submit">Modifier les informations</button>
        <?php endforeach ?>
    </form>
</div>

<?php
$title = 'Enregistrer Pilote';
$titre = 'Enregistrer un Pilote';
include '../includes/top_form.php';

include '../includes/db.php';

$ecuries = $connexion->query("SELECT id, nom FROM ecuries ORDER BY nom ASC");

?>
<div class="formulaire">
    <form method="POST" action="pilote_form.php">
        <label for="nom">Nom du Pilote :</label>
        <input type="text" name="nom" required>
        
        <label for="ecurie">Écurie :</label>
        <select name="ecurie" required>
            <option selected disabled value="">Sélectionnez l'Écurie</option>
            <?php foreach ($ecuries as $ecurie): ?>
                <option value="<?= $ecurie['id']; ?>"><?= $ecurie['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            
        <button type="submit">Enregistrer Pilote</button>
    </form>
</div>
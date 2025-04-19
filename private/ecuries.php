<?php
$title = 'Enregistrer Ecurie';
$titre = 'Enregistrer une Ecurie';
include '../includes/top_form.php';
?>
<div class="formulaire">
    <form method="POST" action="ecurie_form.php">
        <label for="nom">Nom de l'Écurie :</label>
        <input type="text" name="nom" required>
        
        <button type="submit">Enregistrer Écurie</button>
    </form>
</div>
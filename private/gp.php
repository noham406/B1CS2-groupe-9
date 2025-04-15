<?php
$title = 'Enregistrer GP';
$titre = 'Enregistrer un Grand Prix';
include '../includes/top_form.php';
?>
<div class="formulaire">
    <form method="POST" action="grand_prix_form.php">
        <label for="nom">Nom du Grand Prix :</label>
        <input type="text" name="nom" required>
        
        <label for="circuit">Nom du Circuit :</label>
        <input type="text" name="circuit" required>
        
        <label for="date">Date :</label>
        <input type="date" name="date" required>
        
        <label for="sprint">Sprint :</label>
        <select name="sprint" required>
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>

        <button type="submit">Enregistrer Grand Prix</button>
    </form>
</div>

    
    
    
<!-- 

MODIFIER LE FORMULAIRE POUR INCLURE LA COLONNE SPRINT

FINIR LES AFFICHAGES, S'OCCUPER DU MODIFIER ET SUPPRIMER

-->
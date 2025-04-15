<?php
$title = 'Enregistrer Résultats GP';
$titre = 'Enregistrer les résultats d\'un Grand Prix';
include '../includes/top_form.php';

include '../includes/db.php';

$grands_prix = $connexion->query("SELECT id, nom FROM grands_prix ORDER BY date ASC");

$points = array(25, 18, 15, 12, 10, 8, 6, 4, 2, 1);

?>
<div class="formulaire">
    <form method="POST" action="resultats_form.php">
        <select name="grand_prix" required>
            <option selected disabled>Sélectionner un Grand Prix</option>
            <?php foreach ($grands_prix as $gp): ?>
                <option value="<?= $gp['id']; ?>"><?= $gp['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <table>
                <tr>
                    <th>Position</th>
                    <th>Pilote</th>
                    <th>Tour le plus rapide</th>
                    <th>Points</th>
                </tr>
                
                <?php for ($i = 1; $i <= 20; $i++):
            $pilotes = $connexion->query("SELECT id, nom FROM pilotes ORDER BY nom DESC");
            ?>
            <tr>
                <td><input type="number" name="position[<?= $i ?>]" value="<?= $i ?>" readonly></td>
                <td>
                    <select name="pilote<?= $i ?>" id="pilote<?= $i ?>" required>
                        <option selected disabled>Sélectionner un pilote</option>
                        <?php foreach ($pilotes as $pilote) : ?>
                            <option value="<?= $pilote['id'] ?>"><?= $pilote['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="radio" name="fastest_lap" value="<?= $i ?>"></td> <!-- La position du pilote ayant eu le tour le plus rapide sera envoyée -->
                    <td> 
                        <input type="number" name="points[<?= $i; ?>]" 
                        value="<?php
                            if (isset($points[$i-1])) {  // Si la position du pilote est entre 1 et 10 
                                echo $points[$i-1];     // on lui donne les points définis dans le tableau
                            } else {
                                echo 0;                 // sinon on lui donne 0 points
                            }
                            ?>" 
                        readonly>
                    </td>
                    
                </tr>
                <?php endfor; ?>
            </table>
            
            <button type="submit">Enregistrer</button>
        </form>
</div>
<?php
$title = 'Modifier resultats GP';
$titre = 'Modifier les résultats d\'un Grand Prix';
include '../includes/top_form.php';

include '../includes/db.php';

$grands_prix = $connexion->query("SELECT id, nom FROM grands_prix ORDER BY date ASC");

$points = array(25, 18, 15, 12, 10, 8, 6, 4, 2, 1);

?>
<div class="formulaire">
    <form method="POST" action="update_res_gp.php">

        <?php
            $gpid = htmlspecialchars($_POST['id']);
            $sql = "SELECT * FROM resultats WHERE grand_prix_id='$gpid'";
            $reponse = $connexion->query($sql);

            // On indexe les résultats par position pour y accéder facilement dans la boucle
            $resultats = [];
            $position_tour_rapide = null;
            foreach ($reponse as $res) {
                $resultats[$res['position']] = $res['pilote_id'];
                if ($res['tour_le_plus_rapide']) {
                    $position_tour_rapide = $res['position'];
                }
            }
        ?>
            
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
                                <option value="<?= $pilote['id'] ?>" 
                                    <?php if (isset($resultats[$i]) && $resultats[$i] == $pilote['id']) echo "selected"; ?>>
                                    <?= $pilote['nom'] ?>
                                </option>
                                <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="radio" name="fastest_lap" value="<?= $i ?>" 
                        <?php if ($position_tour_rapide == $i) echo "checked"; ?>>
                    </td>
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
                    <input type="hidden" name="gpid" value="<?= $gpid ?>">
                    
                </tr>
                <?php endfor; ?>
            </table>
            <button type="submit">Modifier les informations</button>
        </form>
</div>
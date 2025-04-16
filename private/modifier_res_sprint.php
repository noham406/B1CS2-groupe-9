<?php
$title = 'Modifier resultats GP';
$titre = 'Modifier les résultats d\'un Grand Prix';
include '../includes/top_form.php';

include '../includes/db.php';

$grands_prix = $connexion->query("SELECT id, nom FROM grands_prix WHERE sprint = TRUE ORDER BY date ASC");

$sprint_points = array(8, 7, 6, 5, 4, 3, 2, 1);

?>
<div class="formulaire">
    <form method="POST" action="update_res_sprint.php">

        <?php
            $gpid = htmlspecialchars($_POST['id']);
            $sql = "SELECT * FROM resultats_sprint WHERE grand_prix_id='$gpid'";
            $reponse = $connexion->query($sql);

            // On indexe les résultats par position pour y accéder facilement dans la boucle
            $resultats = [];
            foreach ($reponse as $res) {
                $resultats[$res['position']] = $res['pilote_id'];
            }
        ?>
            
            <table>
                <tr>
                    <th>Position</th>
                    <th>Pilote</th>
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
                        <input type="number" name="points[<?= $i; ?>]"
                        value="<?php
                                if (isset($sprint_points[$i-1])) {  // Si la position du pilote est entre 1 et 10 
                                    echo $sprint_points[$i-1];     // on lui donne les points définis dans le tableau
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
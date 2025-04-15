<?php
$title = 'Affichage Classement';
$titre = 'Classement en fonction des gp';
include '../includes/top_form.php';

include '../includes/db.php';

$grand_prix_id_max = isset($_GET['gp']) ? (int) $_GET['gp'] : 1;

$gps = $connexion->query("SELECT id, nom FROM grands_prix ORDER BY id");
?>
<form method="get" class="choix">
    <select name="gp" id="gp" onchange="this.form.submit()">
        <?php foreach ($gps as $gp): ?>
            <option value="<?= $gp['id'] ?>" <?= $gp['id'] == $grand_prix_id_max ? 'selected' : '' ?>>
                <?= $gp['id'] ?> - <?= $gp['nom'] ?>
            </option>
        <?php endforeach ?>
    </select>
</form>
<main>

    <table summary="" border="1" class="affichage">
        <caption>Classement Général jusqu'au GP <?= $grand_prix_id_max ?></caption>
        <thead>
            <tr>
                <th>Position</th>
                <th>Pilote</th>
                <th>Écurie</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Points des courses
            $course = $connexion->query("
                SELECT r.pilote_id, r.points, r.tour_le_plus_rapide, r.position, p.nom, e.nom AS ecurie
                FROM resultats r
                JOIN pilotes p ON r.pilote_id = p.id
                JOIN ecuries e ON p.ecurie_id = e.id
                WHERE r.grand_prix_id <= $grand_prix_id_max
            ");
            $points_totaux = [];

            foreach ($course as $row) {
                $id = $row['pilote_id'];

                $points_a_ajouter = $row['tour_le_plus_rapide'] == 1 && $row['position'] <= 10 ? 1 : 0;

                if (!isset($points_totaux[$id])) {
                    $points_totaux[$id] = [
                        'nom' => $row['nom'],
                        'ecurie' => $row['ecurie'],
                        'points' => 0
                    ];
                }

                $points_totaux[$id]['points'] += $row['points'] + $points_a_ajouter;
            }

            // Points des sprints
            $sprint = $connexion->query("
                SELECT r.pilote_id, r.points
                FROM resultats_sprint r
                WHERE r.grand_prix_id <= $grand_prix_id_max
            ");

            foreach ($sprint as $row) {
                $id = $row['pilote_id'];
                if (!isset($points_totaux[$id])) {
                    $pilote = $connexion->query("SELECT nom, ecurie FROM pilotes WHERE id = $id")->fetch();
                    $points_totaux[$id] = [
                        'nom' => $pilote['nom'],
                        'ecurie' => $pilote['ecurie'],
                        'points' => 0
                    ];
                }
                $points_totaux[$id]['points'] += $row['points'];
            }

            // Trier par points décroissants
            usort($points_totaux, fn($a, $b) => $b['points'] <=> $a['points']);

            $position = 1;
            foreach ($points_totaux as $pilote): ?>
                <tr>
                    <td><?= $position++ ?></td>
                    <td><?= $pilote['nom'] ?></td>
                    <td><?= $pilote['ecurie'] ?></td>
                    <td><?= $pilote['points'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
<?php include '../includes/bottom_form.php';

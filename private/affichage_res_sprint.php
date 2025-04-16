<?php
$title = 'Résultats Sprint';
$titre = 'Affichage des Résultats d’un Sprint';
include '../includes/top_form.php';

include '../includes/db.php';

$gps = $connexion->query("SELECT id, nom FROM grands_prix WHERE sprint=1 ORDER BY id");

$gp_id = isset($_GET['gp']) ? (int) $_GET['gp'] : 5;
?>

<form method="get" class="choix">
    <select name="gp" id="gp" onchange="this.form.submit()">
        <?php foreach ($gps as $gp): ?>
            <option value="<?= $gp['id'] ?>" <?= $gp['id'] == $gp_id ? 'selected' : '' ?>>
                <?= $gp['id'] ?> - <?= $gp['nom'] ?>
            </option>
        <?php endforeach ?>
    </select>
</form>

<main>
    <table class="affichage">
        <caption>Résultats pour le Sprint du GP <?= $gp_id ?></caption>
        <thead>
            <tr>
                <th>Position</th>
                <th>Pilote</th>
                <th>Écurie</th>
                <th>Points</th>
                <th class="action">
                    <form action="modifier_res_sprint.php" method="post">
                        <input type="hidden" name="id" value="<?= $gp_id ?>">
                        <input type="image" src="../images/modifier.png" alt="">
                    </form>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Récupérer les résultats du GP sélectionné
            $resultats = $connexion->query("
                SELECT r.id, p.nom AS pilote, e.nom AS ecurie, r.position, r.points
                FROM resultats_sprint r
                JOIN pilotes p ON r.pilote_id = p.id
                JOIN ecuries e ON p.ecurie_id = e.id
                WHERE r.grand_prix_id = $gp_id
                ORDER BY r.position
            ");

            foreach ($resultats as $row): ?>
                <tr>
                    <td><?= $row['position'] ?></td>
                    <td><?= $row['pilote'] ?></td>
                    <td><?= $row['ecurie'] ?></td>
                    <td><?= $row['points'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
<?php include '../includes/bottom_form.php';

<?php include 'includes/db.php'; 
$gpid = 21
?>

<main>
<div class="left">
    <div class="track">
        <img src="images/tracks/brazil.jpg" alt="Bresil's track">
    </div>
    <div class="teams_results">
        <table border="1">
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Écurie</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "
                    SELECT 
                        ecuries.nom AS nom_ecurie,
                        SUM(resultats.points + IF(resultats.tour_le_plus_rapide = 1, 1, 0)) + 
                        SUM(IF(resultats_sprint.points IS NOT NULL, resultats_sprint.points, 0)) AS total_points
                    FROM ecuries
                    JOIN pilotes ON pilotes.ecurie_id = ecuries.id
                    JOIN resultats ON resultats.pilote_id = pilotes.id
                    JOIN grands_prix ON grands_prix.id = resultats.grand_prix_id
                    JOIN resultats_sprint ON resultats_sprint.pilote_id = pilotes.id AND resultats_sprint.grand_prix_id = grands_prix.id
                    WHERE grands_prix.id = '$gpid'
                    GROUP BY ecuries.nom
                    ORDER BY total_points DESC;
                ";

                $reponse = $connexion->query($sql);
                $position = 1;

                foreach($reponse as $r): ?>
                    <tr>
                        <td><?= $position++ ?></td>
                        <td><?= $r['nom_ecurie'] ?></td>
                        <td><?= $r['total_points'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Résultats par pilote - Bresil -->
<div class="drivers_results">
<button id="bouton1">resultats</button>
<button id="bouton2">resultats sprint</button>
    <table border="1" id="tableau1">
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
    $sql = "SELECT 
        pilotes.nom AS pilote,
        ecuries.nom AS ecurie,
        resultats.position AS position,
        resultats.points AS points,
        resultats.tour_le_plus_rapide AS fastest_lap
        FROM resultats
        INNER JOIN pilotes ON resultats.pilote_id = pilotes.id
        INNER JOIN grands_prix ON resultats.grand_prix_id = grands_prix.id
        INNER JOIN ecuries ON pilotes.ecurie_id = ecuries.id
        WHERE grands_prix.id = '$gpid'";

    $reponse = $connexion->query($sql);
    foreach($reponse as $r):  
        $bonus = ($r['fastest_lap'] == 1) ? 1 : 0;
        $points_totaux = $r['points'] + $bonus;
        ?>
        <tr>
            <td><?= $r['position'] ?></td>
            <td><?= $r['pilote'] ?></td>
            <td><?= $r['ecurie'] ?></td>
            <td><?= $points_totaux ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>

    <!-- Mise en avant du pilote avec le tour le plus rapide -->
    <div class="fastest_lap">
        <?php
        $sql = "SELECT pilotes.nom AS pilote
                FROM resultats
                INNER JOIN pilotes ON resultats.pilote_id = pilotes.id
                INNER JOIN grands_prix ON resultats.grand_prix_id = grands_prix.id
                WHERE grands_prix.id = '$gpid'
                AND resultats.tour_le_plus_rapide = 1
                LIMIT 1";

        $reponse = $connexion->query($sql);
        $pilote_fastest = $reponse->fetchColumn();
        ?>

        <?php if ($pilote_fastest): ?>
                <p>⭐ Tour le plus rapide : <?= $pilote_fastest ?></p>
        <?php endif; ?>
    </div>

    <table border="1" id="tableau2">
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
            $sql = "SELECT 
                pilotes.nom AS pilote,
                ecuries.nom AS ecurie,
                resultats_sprint.position AS position,
                resultats_sprint.points AS points
                FROM resultats_sprint
                INNER JOIN pilotes ON resultats_sprint.pilote_id = pilotes.id
                INNER JOIN grands_prix ON resultats_sprint.grand_prix_id = grands_prix.id
                INNER JOIN ecuries ON pilotes.ecurie_id = ecuries.id
                WHERE grands_prix.id = '$gpid'";

            $reponse = $connexion->query($sql);
            foreach($reponse as $r):  

            ?>
            <tr>
                <td><?= $r['position'] ?></td>
                <td><?= $r['pilote'] ?></td>
                <td><?= $r['ecurie'] ?></td>
                <td><?= $r['points'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</main>
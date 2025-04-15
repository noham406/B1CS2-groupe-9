<table border="1">
    <tr>
        <th>Pilote</th>
        <th>Écurie</th>
        <th>Résultat</th>
        <th>Résultat Sprint</th>
    </tr>

<?php
$sql = "SELECT 
            pilotes.nom AS pilote,
            ecuries.nom AS ecurie,
            resultats.position AS resultat,
            resultats_sprint.position AS resultat_sprint
        FROM resultats
        INNER JOIN pilotes ON resultats.idPilote = pilotes.id
        INNER JOIN grands_prix ON resultats.idGrandPrix = grands_prix.id
        INNER JOIN ecuries ON resultats.idEcurie = ecuries.id
        LEFT JOIN resultats_sprint ON resultats_sprint.idPilote = pilotes.id 
            AND resultats_sprint.idGrandPrix = grands_prix.id
        WHERE grands_prix.nom = 'Australie'";

$reponse = $connexion->query($sql);
foreach($reponse as $r): ?>
    <tr>
        <td><?= $r['pilote'] ?></td>
        <td><?= $r['ecurie'] ?></td>
        <td><?= $r['resultat'] ?></td>
        <td><?= $r['resultat_sprint'] ?? 'N/A' ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php
$title = 'Affichage Pilotes';
$titre = 'Affichage des Pilotes';
include '../includes/top_form.php';
?>
<main>
    <table summary="" class="affichage">
        <caption>Liste des Pilotes</caption>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Ecuries</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db.php';
            $sql = "SELECT pilotes.id, pilotes.nom AS nom, ecuries.nom AS ecurie
                    FROM pilotes
                    JOIN ecuries ON pilotes.ecurie_id = ecuries.id;";
            $reponse = $connexion->query($sql);
            foreach($reponse as $rep):
                ?>
            <tr>
                <td><?= $rep['nom'] ?></td>
                <td><?= $rep['ecurie'] ?></td>
                <td class="action">
                    <form action="modifier_pilotes.php" method="post">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="image" src="../images/modifier.png" alt="">
                    </form>
                </td>
                <td class="action">
                    <form action="supprimer_pilote.php" method="post" onsubmit="return confirmSuppression()">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="image" src="../images/supprimer.png" alt="">
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
<?php include '../includes/bottom_form.php';
<?php
$title = 'Affichage GP';
$titre = 'Affichage des Grand Prix';
include '../includes/top_form.php';
?>
<main>
    <table summary="" border="1" class="affichage">
        <caption>Liste des Grand Prix</caption>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Circuit</th>
                <th>Date</th>
                <th>Sprint</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db.php';
            $sql = "SELECT gp.id AS id, gp.nom AS nom, gp.circuit AS circuit, gp.date AS date, gp.sprint AS sprint FROM grands_prix gp";
            $reponse = $connexion->query($sql);
            foreach($reponse as $rep):
                ?>
            <tr>
                <td><?= $rep['nom'] ?></td>
                <td><?= $rep['circuit'] ?></td>
                <td><?= $rep['date'] ?></td>
                <td><?= $rep['sprint'] ? 'Oui' : 'Non' ?></td>
                <td class="action">
                    <form action="modifier_gp.php" method="post">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="image" src="../images/modifier.png" alt="">
                    </form>
                </td>
                <td class="action">
                    <form action="supprimer_gp.php" method="post" onsubmit="return confirmSuppression()">
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
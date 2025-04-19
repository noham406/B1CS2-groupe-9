<?php
$title = 'Affichage Ecuries';
$titre = 'Affichage des Ecuries';
include '../includes/top_form.php';
?>
<main>
    <table summary="" class="affichage">
        <caption>Liste des Ecuries</caption>
        <thead>
            <tr>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/db.php';
            $sql = "SELECT id, nom FROM ecuries";
            $reponse = $connexion->query($sql);
            foreach($reponse as $rep):
                ?>
            <tr>
                <td><?= $rep['nom'] ?></td>
                <td class="action">
                    <form action="modifier_ecuries.php" method="post">
                        <input type="hidden" name="id" value="<?= $rep['id'] ?>">
                        <input type="image" src="../images/modifier.png" alt="">
                    </form>
                </td>
                <td class="action">
                    <form action="supprimer_ecurie.php" method="post" onsubmit="return confirmSuppression()">
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
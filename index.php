<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>F1 2024</title>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/mobile.css">
    </head>
    <body>
        <header>
            <h1>
                <a href="index.php?page=accueil">
                    <img src="images/f1_logo.png" alt="logo f1">
                </a>
                F1 2024
            </h1>
            <img src="images/burger.png" alt="" id="burger">
            <a href="index.php?page=public/login" style="text-align: right;"  id="profil">
                <img src="images/profil.png" alt="icône profil">
            </a>
        </header>
        <nav>
            <a href="index.php?page=public/accueil">Accueil</a>
            <a href="index.php?page=public/Bahrein">GP de Bahrein</a>
            <a href="index.php?page=public/Arabie Saoudite">GP d'Arabie Saoudite</a>
            <a href="index.php?page=public/Australie">GP d'Australie</a>
            <a href="index.php?page=public/Japon">GP du Japon</a>
            <a href="index.php?page=public/Chine">GP de Chine</a>
            <a href="index.php?page=public/Miami">GP de Miami</a>
            <a href="index.php?page=public/Emilie Romagne">GP d'Emilie Romagne</a>
            <a href="index.php?page=public/Monaco">GP de Monaco</a>
            <a href="index.php?page=public/Canada">GP du Canada</a>
            <a href="index.php?page=public/Espagne">GP d'Espagne</a>
            <a href="index.php?page=public/Autriche">GP d'Autriche</a>
            <a href="index.php?page=public/Grande Bretagne">GP de Grande Bretagne</a>
            <a href="index.php?page=public/Hongrie">GP de Hongrie</a>
            <a href="index.php?page=public/Belgique">GP de Belgique</a>
            <a href="index.php?page=public/Pays Bas">GP des Pays Bas</a>
            <a href="index.php?page=public/Italie">GP d'Italie</a>
            <a href="index.php?page=public/Azerbaïdjan">GP d'Azerbaïdjan</a>
            <a href="index.php?page=public/Singapour">GP de Singapour</a>
            <a href="index.php?page=public/Etats Unis">GP des Etats Unis</a>
            <a href="index.php?page=public/Mexique">GP du Mexique</a>
            <a href="index.php?page=public/Bresil">GP du Brésil</a>
            <a href="index.php?page=public/Las Vegas">GP de Las Vegas</a>
            <a href="index.php?page=public/Qatar">GP du Qatar</a>
            <a href="index.php?page=public/Abu Dhabi">GP d'Abu Dhabi</a>
        </nav>
        <?php
            global $url;
            global $page;
            if (
                isset($_GET['page'])
            ){
                $url = explode('/', $_GET['page']);
                $file = $url[0].'/'.$url[1].'.php';


                if($url[0] == 'private'){
                    header('Location:private/login.php');
                } else {
                    if(file_exists($file )){
                    $page = $url[0].'/'.$url[1];
                  }
                  include $page.".php";
                }

                // $file = $url[0].'/'.$url[1].'.php';
                
                  
            } else {
                $page = "public/accueil";
                include $page.".php";
            }
        ?>
        <aside>
            <?php
                if(!isset($gpid)){
                    $gpid = 24;
                    include 'includes/db.php';
                }
            ?>
            <table border="1">
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

                        // Requête SQL avec $gpid injecté directement
                        $sql = "
                            SELECT
                                p.id AS pilote_id,
                                p.nom AS nom_pilote,
                                e.nom AS nom_ecurie,
                                SUM(COALESCE(r.points, 0) + 
                                    CASE 
                                        WHEN r.tour_le_plus_rapide = 1 AND r.position <= 10 THEN 1 
                                        ELSE 0 
                                    END
                                ) +
                                COALESCE((
                                    SELECT SUM(rs.points)
                                    FROM resultats_sprint rs
                                    WHERE rs.pilote_id = p.id
                                    AND rs.grand_prix_id <= $gpid
                                ), 0) AS total_points
                            FROM pilotes p
                            JOIN ecuries e ON p.ecurie_id = e.id
                            LEFT JOIN resultats r ON p.id = r.pilote_id AND r.grand_prix_id <= $gpid
                            GROUP BY p.id, p.nom, e.nom
                            ORDER BY total_points DESC
                        ";

                        $reponse = $connexion->query($sql);
                        $position = 1;
                        foreach($reponse as $rep):                        
                    ?>
                    <tr>
                        <td><?= $position++ ?></td>
                        <td><?= $rep['nom_pilote'] ?></td>
                        <td><?= $rep['nom_ecurie'] ?></td>
                        <td><?= $rep['total_points'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </aside>
    <footer>&copy;F1 2024</footer>
    <script type="text/javascript" src="js/article.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
    <script type="text/javascript" src="js/burger.js"></script>
</body>
</html>

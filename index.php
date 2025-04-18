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
            <a href="index.php?page=public/login" style="text-align: right;"  id="profil">
                <img src="images/profil.png" alt="icône profil">
            </a>
        </header>
        <nav>
            <a href="index.php?page=public/accueil">Accueil</a>
            <a href="index.php?page=public/bahrein">GP de Bahrein</a>
            <a href="index.php?page=public/arabie">GP d'Arabie Saoudite</a>
            <a href="index.php?page=public/australie">GP d'Australie</a>
            <a href="index.php?page=public/japon">GP du Japon</a>
            <a href="index.php?page=public/chine">GP de Chine</a>
            <a href="index.php?page=public/miami">GP de Miami</a>
            <a href="index.php?page=public/imola">GP d'Emilie Romagne</a>
            <a href="index.php?page=public/monaco">GP de Monaco</a>
            <a href="index.php?page=public/canada">GP du Canada</a>
            <a href="index.php?page=public/espagne">GP d'Espagne</a>
            <a href="index.php?page=public/autriche">GP d'Autriche</a>
            <a href="index.php?page=public/gb">GP de Grande Bretagne</a>
            <a href="index.php?page=public/hongrie">GP de Hongrie</a>
            <a href="index.php?page=public/belgique">GP de Belgique</a>
            <a href="index.php?page=public/netherlands">GP des Pays Bas</a>
            <a href="index.php?page=public/italie">GP d'Italie</a>
            <a href="index.php?page=public/azerbaidjan">GP d'Azerbaïdjan</a>
            <a href="index.php?page=public/singapour">GP de Singapour</a>
            <a href="index.php?page=public/states">GP des Etats Unis</a>
            <a href="index.php?page=public/mexique">GP du Mexique</a>
            <a href="index.php?page=public/bresil">GP du Brésil</a>
            <a href="index.php?page=public/vegas">GP de Las Vegas</a>
            <a href="index.php?page=public/qatar">GP du Qatar</a>
            <a href="index.php?page=public/abudhabi">GP d'Abu Dhabi</a>
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
            <table border="1">

                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Pilote</th>
                        <th>Ecurie</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Max Verstappen</td>
                        <td>Redbull</td>
                        <td>437</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lando Norris</td>
                        <td>McLaren</td>
                        <td>374</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Charles Leclerc</td>
                        <td>Ferrari</td>
                        <td>356</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Oscar Piastri</td>
                        <td>McLaren</td>
                        <td>292</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Carlos Sainz</td>
                        <td>Ferrari</td>
                        <td>290</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>George Russell</td>
                        <td>Mercedes</td>
                        <td>245</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Lewis Hamilton</td>
                        <td>Mercedes</td>
                        <td>223</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Sergio Perez</td>
                        <td>Redbull</td>
                        <td>152</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Fernando Alonso</td>
                        <td>Aston Martin</td>
                        <td>70</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Pierre Gasly</td>
                        <td>Alpine</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Nico Hulkenberg</td>
                        <td>Haas</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Yuki Tsunoda</td>
                        <td>Racing Bulls</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Lance Stroll</td>
                        <td>Aston Martin</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Esteban Ocon</td>
                        <td>Alpine</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>15</td>
                        <td>Kevin Magnussen</td>
                        <td>Haas</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>16</td>
                        <td>Alex Albon</td>
                        <td>Williams</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>17</td>
                        <td>Daniel Ricciardo</td>
                        <td>Racing Bulls</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>18</td>
                        <td>Oliver Berman</td>
                        <td>Ferrari / Haas</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>19</td>
                        <td>Franco Colapinto</td>
                        <td>Williams</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Zhou Guanyu</td>
                        <td>Stake Sauber</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>Liam Lawson</td>
                        <td>Racing Bulls</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>22</td>
                        <td>Valtteri Bottas</td>
                        <td>Stake Sauber</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>23</td>
                        <td>Logan Sargeant</td>
                        <td>Williams</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>24</td>
                        <td>Jack Doohan</td>
                        <td>Alpine</td>
                        <td>0</td>
                    </tr>
                </tbody>
                
            </table>
        </aside>
    <footer>&copy;F1 2024</footer>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/article.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
</body>
</html>
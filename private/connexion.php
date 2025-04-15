<?php

define('LOGIN_ADMIN', 'admin');
define('MDP_ADMIN', 'Azerty07');

if(
    isset($_POST['login']) && !empty($_POST['login'])
    &&
    isset($_POST['mdp']) && !empty($_POST['mdp'])
){

    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if($login == LOGIN_ADMIN && $mdp == MDP_ADMIN){
        header('Location:admin.php');
    }

} else {
    header('Location:connexion.php');
}
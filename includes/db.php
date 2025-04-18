<?php
define('SERVER', 'mysql:server=localhost;dbname=f12024');
define('LOGIN', 'root');
define('PASSWORD', '');

try {
    $connexion = new PDO(SERVER, LOGIN, PASSWORD);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
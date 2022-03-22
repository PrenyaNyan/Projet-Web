<?php
    $db = "bddprojet";
    $dbhost = "localhost";
    $dbport = 3306;
    $dbuser = "pipou";
    $dbpasswd = "azertyuiop";
    $pdo = new PDO('mysql:host=' . $dbhost . ';port=' . $dbport . ';dbname=' . $db . '', $dbuser, $dbpasswd);
?>
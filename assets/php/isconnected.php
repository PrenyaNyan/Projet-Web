<?php
session_start();
if (isset($_SESSION["newsession"])) {
    header("Location: /assets/html/accueil.php");
    exit();
}
?>
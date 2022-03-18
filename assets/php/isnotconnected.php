<?php
session_start();
if (empty($_SESSION["newsession"])) {
    header("Location: /assets/html/login.php");
    exit();
}?>

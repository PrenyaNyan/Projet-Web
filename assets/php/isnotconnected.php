<?php
session_start();

if (isset($_SESSION["newsession"]) && isset($_POST['send']) && isset($_POST["id"])) {
    $stmt = $pdo->prepare(" SELECT ID_Session 
    FROM users 
    WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();

    if ($_POST['send'] == 'delete' && $_POST["id"] == $res['ID_Session']) {
        unset($_SESSION['newsession']);
    }
}

if (empty($_SESSION["newsession"])) {
    header("Location: /assets/html/login.php");
    exit();
}

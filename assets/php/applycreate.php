<?php

try {
    $stmt = $pdo->prepare(" SELECT ID_USER 
    FROM users 
    WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();
    echo($_SESSION["newsession"]);
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
}

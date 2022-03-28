<?php

try {
    $stmt = $pdo->prepare(" SELECT ID_Session 
    FROM users 
    WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();


    print_r($res);
    
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
}

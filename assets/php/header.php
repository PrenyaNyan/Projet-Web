<?php
try {
    $stmt = $pdo->prepare(" SELECT users.ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    echo($_SESSION);


} catch (\Throwable $th) {
    echo '<option value="erreur" class="navmid">Erreur de connexion a la base de données</option>';
    echo $th;
}
<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_Session
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $modo = '';

    if ($row['ID_Session'] = !3) {
        $modo = '<li><a class="dropdown-item" href="http://localhost/assets/html/moderation.php">Modération</a></li>';
    }

    $buffer = $modo;
    echo $buffer;
} catch (\Throwable $th) {
    echo '<option value="erreur" class="navmid">Erreur de connexion a la base de données</option>';
    echo $th;
}

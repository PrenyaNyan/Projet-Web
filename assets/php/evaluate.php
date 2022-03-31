<?php

try {
    if (isset($_POST['rate'])) {
        echo $_POST['rate'];
        $stmt = $pdo->prepare(" SELECT ID_User 
                            FROM users 
                            WHERE users.USERNAME = ?;");
        $stmt->bindParam(1, $_SESSION["newsession"]);
        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
        $idduuser = $res['ID_User'];
    
        $stmt = $pdo->prepare(" INSERT INTO evaluate (ID_Company, ID_User, GRADE)
                                VALUES (?,?,?);");
        $stmt->bindParam(1, $_POST['idducompany']);
        $stmt->bindParam(2, $idduuser);
        $stmt->bindParam(3, $_POST['rate']);
        $stmt->execute();
        $res = $stmt->fetchAll();
    }
} catch (\Throwable $th) {
    echo 'sexe';
    echo $th;
}

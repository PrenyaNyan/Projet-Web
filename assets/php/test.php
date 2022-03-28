<?php

try {
    require('../php/createPDO.php');
    session_start();
    $stmt = $pdo->prepare(" SELECT ID_User
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();

    if (isset($_GET['valueoffer']) && isset($_GET['send'])) {

        if ($_GET['send'] == "add") {
            $stmt = $pdo->prepare('INSERT INTO `save`(`ID_User`, `ID_Offer`) 
                                VALUES ('.$res['ID_User'].',' . $_GET['valueoffer'] . ');');

            $stmt->execute();
            $res = $stmt->fetchAll();
            $stmt->closeCursor();
        }
        if ($_GET['send'] == "delete") {
            $stmt = $pdo->prepare(' DELETE FROM `save` 
                                    WHERE `save`.`ID_User` = '.$res['ID_User'].' 
                                    AND `save`.`ID_Offer` = ' . $_GET['valueoffer']);

            $stmt->execute();
            $res = $stmt->fetchAll();
            $stmt->closeCursor();
        }
    }

} catch (\Throwable $th) {
    echo $th;
}

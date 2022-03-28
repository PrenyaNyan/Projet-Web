<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $sessionuser = $res['ID_Session'];

    $stmt = $pdo->prepare(" SELECT ID_User
    FROM users 
    WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $IDuser = $res['ID_User'];

    
    $queryoptioncompany = "SELECT * FROM company ";

    if ($sessionuser != 1) {
        $queryoptioncompany .= 'WHERE `ID_User` = ?';
    }
    
    $stmt = $pdo->prepare($queryoptioncompany);
    if ($sessionuser != 1) {
        $stmt->bindParam(1, $IDuser);
    }
    
    $stmt->execute();
    $res = $stmt->fetchAll();
    $stmt->closeCursor();

    foreach ($res as $row) {
        echo '<option value="'.$row['ID_Company'].'">'.$row['NAME'].'</option>';

    }



    

    
    if (isset($_POST['createoffername']) && isset($_POST['placeavailable']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['offerdescription']) && isset($_POST['createcompanyoffer']) && isset($_POST['salary']) && isset($_POST['localisation'])) {
        $stmt = $pdo->prepare(" INSERT INTO `offer`(`NAME`, `STARTDATE`, `ENDDATE`, `REALEASEDATE`, `SALARY`, `NBPLACE`, `DESCRIPTION`, `ID_Company`, `ID_Location`) 
                                VALUES              (?,         ?,          ?,          NOW(),          ?,      ?,          ?,              ?,              ?)");
        $stmt->bindParam(1, $_POST['createoffername']);
        $stmt->bindParam(2, $_POST['startdate']);
        $stmt->bindParam(3, $_POST['enddate']);
        $stmt->bindParam(4, $_POST['salary']);
        $stmt->bindParam(5, $_POST['placeavailable']);
        $stmt->bindParam(6, $_POST['offerdescription']);
        $stmt->bindParam(7, $_POST['createcompanyoffer']);
        $stmt->bindParam(8, $_POST['localisation']);

        

        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
        
    }
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
    echo $th;
    
    
}

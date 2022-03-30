<?php

try{
    $stmt = $pdo->prepare(" SELECT ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
            $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $idduuser = $res['ID_Session'];

    $stmt = $pdo->prepare(" SELECT offer.ID_Company
    FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
    inner JOIN company on offer.ID_Company = company.ID_Company 
    WHERE offer.ID_Offer = ?;");
    $stmt->bindParam(1, $_POST['id']);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();

    $IDCOMPANY = $res['ID_Company'];







}catch (\Throwable $th) {
    echo 'sexe';
}

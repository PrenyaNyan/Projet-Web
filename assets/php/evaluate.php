<?php

try{
    $stmt = $pdo->prepare( "SELECT 
    FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
    inner JOIN company on offer.ID_Company = company.ID_Company 
    WHERE offer.ID_Offer = ?;");

    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $idduuser = $res['ID_Session'];
    echo $idduuser;










}catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
}

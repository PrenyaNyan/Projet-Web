<?php
try {
    $stmt = $pdo->prepare(" SELECT offer.NAME, offer.STARTDATE, offer.ENDDATE, offer.REALEASEDATE, offer.SALARY, offer.NBPLACE, offer.DESCRIPTION 
                            FROM `offer` inner JOIN location ON offer.ID_Location = location.ID_Location 
                            inner JOIN save ON offer.ID_Offer = save.ID_Offer 
                            inner JOIN users ON save.ID_User = users.ID_User 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetchAll();

    print_r($res);
    $stmt->closeCursor();

} catch (\Throwable $th) {
    echo '<option value="erreur">Erreur de connexion a la base de données</option>';
}
?>
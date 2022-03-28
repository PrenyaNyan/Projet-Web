<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_User 
    FROM users 
    WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();
    $companycreateuserid = $res["ID_User"];

    if (isset($_POST['createcompanyname']) && isset($_POST['createemail']) && isset($_POST['createdescription'])) {
        $stmt = $pdo->prepare(" INSERT INTO `company`(`NAME`, `EMAIL`, `DESCRIPTION`, `ID_User`) 
                                VALUES (?,?,?,?);");

        $stmt->bindParam(1, $_POST['createcompanyname']);
        $stmt->bindParam(2, $_POST['createemail']);
        $stmt->bindParam(3, $_POST['createdescription']);
        $stmt->bindParam(4, $companycreateuserid);
        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
    }
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
    echo $th;
}

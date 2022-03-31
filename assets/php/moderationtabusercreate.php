<?php
try {
    $stmt = $pdo->prepare(" SELECT ID_Session 
                            FROM users 
                            WHERE users.USERNAME = ?;");
    $stmt->bindParam(1, $_SESSION["newsession"]);
    $stmt->execute();
    $res = $stmt->fetch();
    $stmt->closeCursor();


    $createuseroption = '   <select class="form-select" name="createsessionuser" aria-label="Default select example">
                                <option value="3" selected>Etudiant</option>
                                <option value="4">Delegue</option>';

    if ($res['ID_Session'] == 1 || $res['ID_Session'] == 2) {
        $createuseroption .= '<option value="2">Pilote</option>';
    }
    if ($res['ID_Session'] == 1) {
        $createuseroption .= '<option value="1">Admin</option>';
    }
    echo $createuseroption . '</select>';

    if (isset($_POST['createfirstname']) && isset($_POST['createlastname']) && isset($_POST['createusername']) && isset($_POST['createpassword']) && isset($_POST['createsessionuser'])) {
        $stmt = $pdo->prepare(" INSERT INTO `users`(`FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`, `ID_Session`) 
                                VALUES (?,?,?,?,?)");
        $stmt->bindParam(1, $_POST['createfirstname']);
        $stmt->bindParam(2, $_POST['createlastname']);
        $stmt->bindParam(3, $_POST['createusername']);
        $stmt->bindParam(4, $_POST['createpassword']);
        $stmt->bindParam(5, $_POST['createsessionuser']);
        $stmt->execute();
        $res = $stmt->fetch();
        $stmt->closeCursor();
    }
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" style="margin-left: auto;margin-right: auto;" role="alert">Vous n\'avez pas l\'autorisation suffisante pour cette action !</div>';
    echo $th;
}

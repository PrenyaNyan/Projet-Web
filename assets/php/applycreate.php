<?php

try {
    if (isset($_POST["file_name"])) {
            $stmt = $pdo->prepare(" SELECT ID_User 
                            FROM users 
                            WHERE users.USERNAME = ?;");
            $stmt->bindParam(1, $_SESSION["newsession"]);
            $stmt->execute();
            $res = $stmt->fetch();
            $stmt->closeCursor();
            $idduuser = $res['ID_User'];

            $stmt = $pdo->prepare(" INSERT INTO ApplyFor (ID_User, ID_OFFER, CV, CoverLetter, Step)
                            VALUES (?,?,?,?,1);");
            $stmt->bindParam(1, $idduuser);
            $stmt->bindParam(2, $_POST["ID_OffrePostuler"]);
            $stmt->bindParam(3, $_POST["file_name"]);
            $stmt->bindParam(4, $_POST["textareaA"]);
            $stmt->execute();
            $res = $stmt->fetch();
     }
} catch (\Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">
    This is a danger alert—check it out!</div>';
    echo $th;
}
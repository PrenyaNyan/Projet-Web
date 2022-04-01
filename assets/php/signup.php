<?php
if (isset($_POST["firstname"])) {
    if ($_POST["firstname"] == "" || $_POST["lastname"] == "" || $_POST["password"] == "" || $_POST["passwordconfirm"] == "" || $_POST["roleselected"] == "" || $_POST["username"] == "") {
        echo '<div class="alert alert-danger" role="alert">Champs non remplis</div>';
    } else if ($_POST["roleselected"] == 1 || $_POST["roleselected"] == 2) {
        signup($pdo);
    } else {
        if ($_POST["promo"] == "Promotion") {
            echo '<div class="alert alert-danger" role="alert">Champs non remplis</div>';
        } else {
            signup($pdo);
        }
    }
}

function signup($pdo)
{
    try {
        $stmt = $pdo->prepare("SELECT * FROM `users` where USERNAME = ?");
        $stmt->bindParam(1, $_POST["username"]);
        $stmt->execute();
        $res = $stmt->fetch();

        $stmt->closeCursor();

        if ($stmt->rowCount() == 1) {
            echo '<div class="alert alert-danger" role="alert">Nom d\'utilisateur deja utilisé</div>';
        } else if ($_POST["password"] != $_POST["passwordconfirm"]) {
            echo '<div class="alert alert-danger" role="alert">Erreur de mot de passe</div>';
        } else {
            $stmt = $pdo->prepare(" INSERT INTO `users`(`FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`, `ID_Session`)
                                            VALUES 
                                            (?,?,?,?,?);");
            $stmt->bindParam(1, $_POST["firstname"]);
            $stmt->bindParam(2, $_POST["lastname"]);
            $stmt->bindParam(3, $_POST["username"]);
            $stmt->bindParam(4, $_POST["password"]);
            $stmt->bindParam(5, $_POST["roleselected"]);
            $stmt->execute();
            $res = $stmt->fetch();
            $stmt->closeCursor();

            if ($_POST["roleselected"] == 3 || $_POST["roleselected"] == 4) {
                $stmt = $pdo->prepare("INSERT INTO `belong`(`ID_Promotion`, `ID_User`) VALUES (?,(SELECT MAX(ID_User) FROM users))");

                $stmt->bindParam(1, $_POST["promo"]);
                $stmt->execute();
                $res = $stmt->fetch();

                print_r($res);
                $stmt->closeCursor();

                $_SESSION["newsession"] = $_POST["username"];
            }
        }
    } catch (\Throwable $th) {
        echo '<option value="erreur">Erreur de connexion a la base de données</option>';
    }
}

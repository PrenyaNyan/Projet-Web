<?php
if (isset($_GET["firstname"])) {
    if ($_GET["firstname"] == "" || $_GET["lastname"] == "" || $_GET["password"] == "" || $_GET["passwordconfirm"] == "" || $_GET["roleselected"] == "" || $_GET["username"] == "") {
        echo '<div class="alert alert-danger" role="alert">Champs non remplis</div>';
    } else if ($_GET["roleselected"] == 1 || $_GET["roleselected"] == 2) {
        signup($pdo);
    } else {
        if ($_GET["promo"] == "Promotion") {
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
        $stmt->bindParam(1, $_GET["username"]);
        $stmt->execute();
        $res = $stmt->fetch();

        $stmt->closeCursor();

        if ($stmt->rowCount() == 1) {
            echo '<div class="alert alert-danger" role="alert">Nom d\'utilisateur deja utilisé</div>';
        } else if ($_GET["password"] != $_GET["passwordconfirm"]) {
            echo '<div class="alert alert-danger" role="alert">Erreur de mot de passe</div>';
        } else {
            $stmt = $pdo->prepare(" INSERT INTO `users`(`FIRSTNAME`, `LASTNAME`, `USERNAME`, `PASSWORD`, `ID_Session`)
                                            VALUES 
                                            (?,?,?,?,?);");
            $stmt->bindParam(1, $_GET["firstname"]);
            $stmt->bindParam(2, $_GET["lastname"]);
            $stmt->bindParam(3, $_GET["username"]);
            $stmt->bindParam(4, $_GET["password"]);
            $stmt->bindParam(5, $_GET["roleselected"]);
            $stmt->execute();
            $res = $stmt->fetch();
            $stmt->closeCursor();

            if ($_GET["roleselected"] == 3 || $_GET["roleselected"] == 4) {
                $stmt = $pdo->prepare("INSERT INTO `belong`(`ID_Promotion`, `ID_User`) VALUES (?,(SELECT MAX(ID_User) FROM users))");

                $stmt->bindParam(1, $_GET["promo"]);
                $stmt->execute();
                $res = $stmt->fetch();

                print_r($res);
                $stmt->closeCursor();

                $_SESSION["newsession"] = $_GET["username"];
            }
        }
    } catch (\Throwable $th) {
        echo '<option value="erreur">Erreur de connexion a la base de données</option>';
    }

    if (isset($_SESSION["newsession"])) {
        header("Location: accueil.php");
        exit();
    }
}

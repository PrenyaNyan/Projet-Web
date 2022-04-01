<?php
if (isset($_POST["username"])) {
    if ($_POST["username"] == "" || $_POST["password"] == "") {
        echo '<div class="alert alert-danger" role="alert">Champs non remplis</div>';
    } else {
        try {
            require('../php/createPDO.php');

            $stmt = $pdo->prepare("SELECT * FROM `users` where USERNAME=? and PASSWORD=?");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->execute();
            $res = $stmt->fetch();

            if ($stmt->rowCount() == 1) {
                echo '<div class="alert alert-success" role="alert">Connexion réussis</div>';
                $_SESSION["newsession"] = $res[3];
            } else {
                echo '<div class="alert alert-danger" role="alert">Nom d\'utilisateur ou mot de passe incorrect</div>';
            }
        } catch (\Throwable $th) {
            echo '<div class="alert alert-danger" role="alert">Erreur de connexion a la base de données</div>';
        }

        $stmt->closeCursor();
    }



    if (isset($_SESSION["newsession"])) {
        header("Location: accueil.php");
        exit();
    }
}

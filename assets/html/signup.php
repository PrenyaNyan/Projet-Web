<?php
session_start();
if (isset($_SESSION["newsession"])) {
    header("Location: /assets/html/accueil.php");
    exit();
}
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/login-signup.css">
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="signup.php" method="get">

            <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" width="120">
            <h1 class="h3 mb-3 fw-normal">Sign Up DepiStage</h1>
            <div id="FormContent">
                <div class="form-floating">
                    <input class="form-control FirstInput" id="floatingFirstName" placeholder="First Name" name="firstname">
                    <label for="floatingFirstName">First Name</label>
                </div>
                <div class="form-floating">
                    <input class="form-control MiddleInput" id="floatingLastName" placeholder="Last Name" name="lastname">
                    <label for="floatingLastName">Last Name</label>
                </div>
                <div class="form-floating">
                    <input class="form-control MiddleInput" id="floatingUsername" placeholder="Username" name="username">
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control MiddleInput" id="floatingSignUpPassord" placeholder="Password" name="password">
                    <label for="floatingSignUpPassord">Password</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control MiddleInput" id="floatingPasswordConfirmation" placeholder="PasswordConfirmation" name="passwordconfirm">
                    <label for="floatingPasswordConfirmation">Password Confirmation</label>
                </div>
                <div class="form-floating">
                    <select class="form-select LastInput" id="roleselect" name="roleselected">
                        <option selected>Select a role</option>
                        <option value="1">Admin</option>
                        <option value="2">Pilote</option>
                        <option value="3">Etudiant</option>
                        <option value="4">Delegue</option>
                    </select>
                </div>
                <div class="form-floating added">
                    <select class="form-select LastInput" id="inputpromo" name="promo">
                        <option selected id="promoname">Promotion</option>

                        <?php
                        try {
                            $db = "bddprojet";
                            $dbhost = "localhost";
                            $dbport = 3306;
                            $dbuser = "pipou";
                            $dbpasswd = "azertyuiop";
                            $pdo = new PDO('mysql:host=' . $dbhost . ';port=' . $dbport . ';dbname=' . $db . '', $dbuser, $dbpasswd);
                            $stmt = $pdo->prepare("SELECT * FROM `promotion`");
                            $stmt->execute();
                            $res = $stmt->fetchAll();

                            print_r($res);
                            $stmt->closeCursor();

                            foreach ($res as $row) {
                                echo '<option value="' . $row['ID_Promotion'] . '">' . $row['NAME'] . '</option>';
                            }
                        } catch (\Throwable $th) {
                            echo '<option value="erreur">Erreur de connexion a la base de données</option>';
                        }
                        ?>
                    </select>
                </div>

            </div>
            <div id="FormButton">
                <button type="button" class="btn btn-primary btn-lg" id="SignInForm" onclick="window.location.href='login.php';">Login</button>
                <button class="btn btn-secondary btn-lg espace" type="submit" id="SignUpSubmit" method="post">Submit</button>
            </div>

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
                        $stmt = $pdo->prepare("INSERT INTO `belong`(`ID_Promotion`, `ID_User`) VALUES (?,SELECT MAX(ID_User) FROM users)");

                        $stmt->bindParam(1, $_GET["promo"]);
                        $stmt->execute();
                        $res = $stmt->fetch();

                        print_r($res);
                        $stmt->closeCursor();
                    }
                }
            }


            ?>


            <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scriptsignup1.js"></script>
</body>

</html>
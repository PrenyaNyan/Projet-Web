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
        <form action="login.php" method="get">

            <img src="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" width="120">
            <h1 class="h3 mb-3 fw-normal">Login DepiStage</h1>
            <div id="FormContent">
                <div class="form-floating">
                    <input class="form-control FirstInput" id="floatingUsername" placeholder="Username" name="Username">
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control LastInput" id="floatingPassword" placeholder="Password" name="Password">
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            <div id="FormButton">
                <button type="button" class="btn btn-lg btn-primary" id="SignUpForm" onclick="window.location.href='signup.php';">Sign Up</button>
                <button type="submit" class="btn btn-secondary btn-lg" id="SignInSubmit">Submit</button>
            </div>

            <?php
            $db = "bddprojet";
            $dbhost = "localhost";
            $dbport = 3306;
            $dbuser = "pipou";
            $dbpasswd = "azertyuiop";

            if (isset($_GET["Username"]) || isset($_GET["Password"])) {
                if ($_GET["Username"] == "" && $_GET["Password"] == "") {
                    echo '<div class="alert alert-danger" role="alert">Champs non remplis</div>';
                } else {
                    try {
                        $pdo = new PDO('mysql:host=' . $dbhost . ';port=' . $dbport . ';dbname=' . $db . '', $dbuser, $dbpasswd);

                        $stmt = $pdo->prepare("SELECT * FROM `users` where USERNAME=? and PASSWORD=?");
                        $stmt->bindParam(1, $_GET["Username"]);
                        $stmt->bindParam(2, $_GET["Password"]);
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
            ?>
            <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
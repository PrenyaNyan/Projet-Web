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
                    <input class="form-control FirstInput" id="floatingName" placeholder="Name" name="name">
                    <label for="floatingName">Name</label>
                </div>
                <div class="form-floating">
                    <input class="form-control MiddleInput" id="floatingFirstName" placeholder="First Name" name="firstname">
                    <label for="floatingFirstName">First Name</label>
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
                        <option value="3">Delegue</option>
                    </select>
                </div>

            </div>
            <div id="FormButton">
                <button type="button" class="btn btn-primary btn-lg" id="SignInForm" onclick="window.location.href='login.php';">Login</button>
                <button class="btn btn-secondary btn-lg espace" type="submit" id="SignUpSubmit" method="post">Submit</button>
            </div>

            
            <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scriptsignup.js"></script>
</body>

</html>
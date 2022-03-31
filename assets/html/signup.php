<?php
require('../php/isconnected.php');
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="https://cdn.discordapp.com/attachments/950033739604434965/950403057567551528/logo.png" />

    <link rel="manifest" href="/manifest.json">
    <link rel="apple-touch-icon" href="/assets/images/Dep-152.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="/assets/images/Dep-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

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
                        <option value="3">Etudiant</option>
                    </select>
                </div>
                <div class="form-floating added">
                    <select class="form-select LastInput" id="inputpromo" name="promo">
                        <option selected id="promoname">Promotion</option>

                        <?php
                        require('../php/createPDO.php');
                        require('../php/querypromotion.php');
                        ?>
                    </select>
                </div>

            </div>
            <div id="FormButton">
                <button type="button" class="btn btn-primary btn-lg" id="SignInForm" onclick="window.location.href='login.php';">Login</button>
                <button class="btn btn-secondary btn-lg espace" type="submit" id="SignUpSubmit" method="post">Submit</button>
            </div>

            <?php
            require('../php/querysignup.php');
            ?>


            <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scriptsignup1.js"></script>
    <script src="/sw.js"></script>
</body>

</html>
<?php
require('../php/isconnected.php');
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>DepiStage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/assets/images/hello-icon-152.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="white" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="/assets/images/hello-icon-144.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">

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
                    <input class="form-control FirstInput" id="floatingUsername" placeholder="Username" name="username">
                    <label for="floatingUsername">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control LastInput" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                </div>
            </div>
            <div id="FormButton">
                <button type="button" class="btn btn-lg btn-primary" id="SignUpForm" onclick="window.location.href='signup.php';">Sign Up</button>
                <button type="submit" class="btn btn-secondary btn-lg" id="SignInSubmit">Submit</button>
            </div>

            <?php
            require('../php/login.php')
            ?>
            <p class="mt-5 mb-3 text-muted">© 2021 DepiStage, Inc. All rights reserved.</p>
        </form>
    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="../vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/sw.js"></script>
</body>

</html>